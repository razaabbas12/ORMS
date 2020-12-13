<?php

namespace App\DataTables;

use App\User;
use App\Models\Booking;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Auth;
use App\Helpers\Helper;

class TailorDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
         ->eloquent($query)
        ->addColumn('from', function ($query){

                return Helper::cityToName($query->from);   
            })
        ->addColumn('to', function ($query){

                return Helper::cityToName($query->from);   
            })
        ->addColumn('customer', function ($query){

                return Helper::customerIdToName($query->customer_id);   
            })
        ->addColumn('train', function ($query){

                return Helper::userIdToName($query->train_id);   
            })
        ->escapeColumns([]);           

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Tailor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Booking $model)
    {   
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('tailor-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        // Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('customer'),
            Column::make('train'),
            Column::make('from'), 
            Column::make('to'),
            Column::make('book_seats'),
            Column::make('fare'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Tailor_' . date('YmdHis');
    }
}
