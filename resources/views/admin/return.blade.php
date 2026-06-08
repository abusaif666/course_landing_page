@extends('admin.layouts.admin')

@section('title', 'Return Passport List')

@section('content')
    <div class="admin_dashboard_table_wrapper">
        <div class="admin_dashboard_table_header_area">
            <div class="admin_dashboard_table_title">Return Passport List</div>
            <div class="admin_dashboard_table_filter_area">
                <input type="search" placeholder="Search">
                <a class="table_data_export_pdf_btn" href=""><i class="fa-solid fa-file-pdf"></i> PDF</a>
            </div>
        </div>
        <div class="admin_dashboard_table_area">
            <table class="admin_dashboard_table admin_dashboard_normal_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Passport No</th>
                        <th>Entry Date</th>
                        <th>Return Date</th>
                        <th>Return By</th>
                        <th class="action_area">Action</th>
                    </tr>
                </thead>

                <tbody>
                        <tr>
                            <td>1</td>
                            <td>Md Abu Saif</td>
                            <td>A084521565</td>
                            <td>02 February, 2026</td>
                            <td>12 March, 2026</td>
                            <td>Mohammad Ali</td>
                            <td class="action_area">
                                <div class="table_action_all_button">
                                    <a class="action_btn view" href="#"> <i class="fa fa-eye"></i> </a>
                                    <a class="action_btn edit" href="#"> <i class="fa fa-pen"></i> </a>
                                    <a class="action_btn delete" href="#"> <i class="fa fa-trash"></i> </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Md Abu Saif</td>
                            <td>A084521565</td>
                            <td>02 February, 2026</td>
                            <td>12 March, 2026</td>
                            <td>Khalid</td>
                            <td class="action_area">
                                <div class="table_action_all_button">
                                    <a class="action_btn view" href="#"> <i class="fa fa-eye"></i> </a>
                                    <a class="action_btn edit" href="#"> <i class="fa fa-pen"></i> </a>
                                    <a class="action_btn delete" href="#"> <i class="fa fa-trash"></i> </a>
                                </div>
                            </td>
                        </tr>

                </tbody>
            </table>

        </div>
        <div class="admin_dashboard_table_bottom_area">
            <div class="admin_dashboard_table_pagination_wrapper">
                <div class="pagination">
                    <ul>
                        <li><a href="#"><i class="fa fa-arrow-left"></i></a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
