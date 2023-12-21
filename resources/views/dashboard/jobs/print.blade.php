@extends('dashboard.layouts.main')
@section('title', 'Jobs Print| CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/activevacancies/">Laporan Lowongan</a></li>
@endsection

@section('container')

    <!-- DataTables Kategori Lowongan -->
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center">Laporan Lowongan</h5>
    </div>
    <div class="table-responsive">
        <table id="exportdata" class="table table-striped table-bordered zero-configuration" style="border: 1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td align="left">{{ $job->position }}</td>
                        <td> {{ Carbon\Carbon::parse($job->published_at)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#exportdata').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        titleAttr: 'PDF',
                        download: 'open',
                        customize: function(doc) {
                            doc.content.splice(1, 0, {
                                margin: [0, 0, 0, 12],
                                alignment: 'center',
                                title: 'Laporan Lowongan',
                                image: "";
                            })
                        }
                    }
                ]
            });
        });
    </script>
@endsection
