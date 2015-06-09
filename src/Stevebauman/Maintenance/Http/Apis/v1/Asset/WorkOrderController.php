<?php

namespace Stevebauman\Maintenance\Http\Apis\v1\Asset;

use Stevebauman\Maintenance\Repositories\Asset\Repository as AssetRepository;
use Stevebauman\Maintenance\Http\Apis\v1\Controller as BaseController;

class WorkOrderController extends BaseController
{
    /**
     * @var AssetRepository
     */
    protected $asset;

    /**
     * Constructor.
     *
     * @param AssetRepository $asset
     */
    public function __construct(AssetRepository $asset)
    {
        $this->asset = $asset;
    }

    /**
     * Returns a new asset work order grid.
     *
     * @param int|string $assetId
     *
     * @return \Cartalyst\DataGrid\DataGrid
     */
    public function grid($assetId)
    {
        $columns = [
            'id',
            'created_at',
            'user_id',
            'subject',
        ];

        $settings = [];

        $transformer = function($workOrder)
        {
            return [
                'id' => $workOrder->id,
                'created_at' => $workOrder->created_at,
                'subject' => $workOrder->subject,
                'view_url' => route('maintenance.work-orders.show', [$workOrder->id]),
                'created_by' => $workOrder->user->full_name,
                'status' => $workOrder->viewer()->lblStatus(),
                'priority' =>  $workOrder->viewer()->lblPriority(),
            ];
        };

        return $this->asset->gridWorkOrders($assetId, $columns, $settings, $transformer);
    }
}
