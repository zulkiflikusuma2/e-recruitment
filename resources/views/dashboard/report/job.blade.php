@extends('dashboard.layouts.main')
@section('title', 'Jobs | CBI')
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
                    <th>Tanggal Upload</th>
                    <th>Tanggal Tutup</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td align="left">{{ $job->position }}</td>
                        <td> {{ Carbon\Carbon::parse($job->published_at)->format('d/m/Y') }}</td>
                        <td> {{ Carbon\Carbon::parse($job->close_date)->format('d/m/Y') }}</td>
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
                        title: 'Laporan Lowongan',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Laporan Lowongan',
                        titleAttr: 'PDF',
                        download: 'open',
                        messageTop: 'Berikut data lowongan yang pernah dipublikasikan di website rekrutmen:',
                        customize: function(doc) {
                            //Remove the title created by datatTables
                            doc.content.splice(0, 1);
                            //Create a date string that we use in the footer. Format is dd-mm-yyyy
                            var now = new Date();
                            var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now
                                .getFullYear();
                            // Logo converted to base64
                            // var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
                            // The above call should work, but not when called from codepen.io
                            // So we use a online converter and paste the string in.
                            // Done on http://codebeautify.org/image-to-base64-converter
                            // It's a LONG string scroll down to see the rest of the code !!!
                            var logo =

                                'data:image/png;base64,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';
                            // A documentation reference can be found at
                            // https://github.com/bpampuch/pdfmake#getting-started
                            // Set page margins [left,top,right,bottom] or [horizontal,vertical]
                            // or one number for equal spread
                            // It's important to create enough space at the top for a header !!!
                            doc.pageMargins = [20, 150, 20, 30];
                            // Set the font size fot the entire document
                            doc.defaultStyle.fontSize = 12;
                            // Set the fontsize for the table header
                            doc.styles.tableHeader.fontSize = 12;
                            // Create a header object with 3 columns
                            // Left side: Logo
                            // Middle: brandname
                            // Right side: A document title
                            doc['header'] = (function() {
                                return {
                                    columns: [{
                                            image: logo,
                                            width: 200
                                        },
                                        {

                                        },
                                        {
                                            alignment: 'left',
                                            fontSize: 10,
                                            text: [
                                                'PT Century Batteries Indonesia\n',
                                                'Jl. Mitra Raya Selatan I Blok E/No. 17-18\n',
                                                'Parung Mulya, Ciampel Kawasan KIM - Karawang\n',
                                                'Telp: (62-21) 29488812, email: contact@incoe.astra.co.id\n',
                                            ]
                                        }
                                    ],
                                    margin: 20
                                }
                            });
                            // Create a footer object with 2 columns
                            // Left side: report creation date
                            // Right side: current page and total pages
                            doc['footer'] = (function(page, pages) {
                                return {
                                    columns: [{
                                            alignment: 'left',
                                            text: ['Created on: ', {
                                                text: jsDate.toString()
                                            }]
                                        },
                                        {
                                            alignment: 'right',
                                            text: ['page ', {
                                                text: page.toString()
                                            }, ' of ', {
                                                text: pages.toString()
                                            }]
                                        }
                                    ],
                                    margin: 20
                                }
                            });
                            // Change dataTable layout (Table styling)
                            // To use predefined layouts uncomment the line below and comment the custom lines below
                            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
                            var objLayout = {};
                            objLayout['hLineWidth'] = function(i) {
                                return .5;
                            };
                            objLayout['vLineWidth'] = function(i) {
                                return .5;
                            };
                            objLayout['hLineColor'] = function(i) {
                                return '#aaa';
                            };
                            objLayout['vLineColor'] = function(i) {
                                return '#aaa';
                            };
                            objLayout['paddingLeft'] = function(i) {
                                return 4;
                            };
                            objLayout['paddingRight'] = function(i) {
                                return 4;
                            };
                            doc.content[0].layout = objLayout;
                        }
                    }
                ]
            });
        });
    </script>
@endsection
