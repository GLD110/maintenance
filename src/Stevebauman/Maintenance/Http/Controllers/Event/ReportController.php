<?php

namespace Stevebauman\Maintenance\Http\Controllers\Event;

use Stevebauman\Maintenance\Validators\Event\ReportValidator;
use Stevebauman\Maintenance\Services\Event\EventService;
use Stevebauman\Maintenance\Services\Event\ReportService;
use Stevebauman\Maintenance\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * @var EventService
     */
    protected $event;

    /**
     * @var ReportService
     */
    protected $report;

    /**
     * @var ReportValidator
     */
    protected $reportValidator;

    /**
     * Constructor.
     *
     * @param EventService $event
     * @param ReportService $report
     * @param ReportValidator $reportValidator
     */
    public function __construct(EventService $event, ReportService $report, ReportValidator $reportValidator)
    {
        $this->event = $event;
        $this->report = $report;
        $this->reportValidator = $reportValidator;
    }

    /**
     * Creates a new report on the specified event.
     *
     * @param int|string $event_id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store($event_id)
    {
        /*
         * Add unique validation rule
         */
        $this->reportValidator->addRule('description', sprintf('unique_event_report:%s', $event_id));

        if ($this->reportValidator->passes()) {
            $event = $this->event->find($event_id);

            $data = $this->inputAll();
            $data['event_id'] = $event->id;

            $report = $this->report->setInput($data)->create();

            if ($report) {
                $this->message = 'Succesfully created report';
                $this->messageType = 'success';
                $this->redirect = routeBack('maintenance.events.show', [$event->id]);
            } else {
                $this->message = 'There was an error trying to create an report. Please try again';
                $this->messageType = 'danger';
                $this->redirect = routeBack('maintenance.events.show', [$event->id]);
            }
        } else {
            $this->errors = $this->reportValidator->getErrors();
            $this->redirect = routeBack('maintenance.events.show', [$event_id]);
        }

        return $this->response();
    }

    public function edit($event_id, $report_id)
    {
    }

    public function update($event_id, $report_id)
    {
    }

    public function destroy($event_id, $report_id)
    {
    }
}
