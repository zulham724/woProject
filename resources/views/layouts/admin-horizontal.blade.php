<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>

    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- CUSTOM STYLE  -->
    <link href="{{asset('css/horizontal-admin.css')}}" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    {{-- full calendar --}}
    <link rel='stylesheet' href='{{asset('fullcalendar/fullcalendar.css')}}' />
    <!-- Scripts -->

    @yield('css')

</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="{{asset('img/logo/logo.png')}}" />
                </a>

            </div>

            <div class="right-div">
                <a href="#" class="btn btn-info pull-right" onclick="logout()"><i class="fa fa-sign-out-alt"></i> LOG ME OUT</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="{{url('schedule')}}" @yield('schedule-active') ><i class="fa fa-calendar-check"></i> Schedule</a></li>
                             <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-calendar"></i> Kursus <span class="badge" </span> <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                        <a class='text-center' href="{{url('courseslists')}}" data-toggle='modal' >
                                            <i class="fa fa-list-alt "></i>
                                            <strong> Input List Kursus</strong>
                                            <i class='fa fa-angle-right'></i>
                                        </a>
                                    </li>
                                     <li>
                                        <a class='text-center' href="{{url('courses')}}" data-toggle='modal' >
                                            <i class="fa fa-user "></i>
                                            <strong> Data Peserta Kursus</strong>
                                            <i class='fa fa-angle-right'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class='text-center' href="{{url('coursepayments')}}" data-toggle='modal' >
                                            <i class="fa fa-money-bill"></i>
                                            <strong> Angsuran Kursus</strong>
                                            <i class='fa fa-angle-right'></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-messages -->
                            </li>
                            <li class="dropdown" >
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-book"></i> Order <span class="badge" </span> <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-messages" >
                                    <li>
                                        <a class='text-center' href="{{route('itemlists.index')}}" data-toggle='modal' >
                                            <i class="fa fa-list-alt "></i>
                                            <strong> Input List Pesanan</strong>
                                            <i class='fa fa-angle-right'></i>
                                        </a>
                                    </li>
                                     <li>
                                        <a class='text-center' href="{{route('orders.index')}}" data-toggle='modal' >
                                            <i class="fa fa-shopping-cart  "></i>
                                            <strong> Data List Order</strong>
                                            <i class='fa fa-angle-right'></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-messages -->
                            </li>

                            <li><a href="{{route('users.index')}}" @yield('staff-active') ><i class="fa fa-users "></i> Staff</a></li>
                            <li><a href="{{route('pembayaran.create')}}" @yield('pembayaran-active') ><i class="fa fa-money-bill-alt "></i> Pembayaran</a></li>
                            <li><a href="{{route('memo.index')}}" @yield('memo-active') ><i class="fa fa-clipboard"></i> Request & Memo</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-envelope fa-fw"></i> Notification <span class="badge" id="countNotif">{{$countNotif}}</span> <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-messages" id="notification">
                                    <li>
                                        <a class='text-center' href='#' data-toggle='modal' data-target='#notifModal'>
                                            <strong>Read All Activities</strong>
                                            <i class='fa fa-angle-right'></i>
                                        </a>
                                    </li>
                                    @foreach($notification as $n => $notif)
                                    <li>
                                        <a href='#'>
                                            <div>
                                                <img src="{{ asset('storage\uploads\avatars\default.png') }}" width="50"> <strong> {{$notif->title}}</strong>
                                            </div>
                                            <div>{{$notif->content}}</div>
                                            <span class='text-muted'>
                                                    <em>pada tanggal {{$notif->created_at}}</em>
                                            </span>
                                        </a>
                                    </li>
                                    <li class='divider'></li>
                                    @endforeach
                                </ul>
                                <!-- /.dropdown-messages -->
                            </li>
                        </ul>
                            <!-- /.dropdown -->
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper" id="app">
    @yield('content')
    </div>

    {{-- every modal placed here --}}
    <!-- Modal -->
    <div id="notifModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Penanggung Jawab</td>
                        <td>Berita</td>
                        <td>Waktu</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allNotif as $index => $ini)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$ini->title}}</td>
                        <td>{{$ini->content}}</td>
                        <td>{{$ini->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    {{-- end modal --}}

     <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   &copy; 2018 Ardata Indonesia |<a href="http://ardata.co.id" target="_blank"  > Ardata Indonesia</a>
                </div>

            </div>
        </div>
    </section>

    {{-- <script src="{{asset('js/jquery-1.10.2.js')}}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- jquery currency --}}
    <script src="{{asset('js/jquery.formatCurrency-1.4.0.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/jquery.formatCurrency.id-ID.js')}}" charset="utf-8"></script>
    {{-- bootstrap and angular tags input --}}
    <script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    {{-- <script src="{{asset('js/bootstrap.min.js')}}"></script> --}}
    <!-- DATATABLE SCRIPTS  -->
    <script src="{{asset('js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('fullcalendar/lib/moment.min.js')}}"></script>
    <script src="{{asset('fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('fullcalendar/locale/id.js')}}"></script>
    <script src="{{asset('js/printThis.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.29/sweetalert2.all.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#table").DataTable();
        });

        const logout = ()=>{
        swal({
            type:"info",
            title: "Logout from here?",
            confirmButtonText: "<i class='fa fa-thumbs-up'></i> Yes, Log me out",
            showCancelButton:true,
            cancelButtonColor: '#d33',
            cancelButtonText: "<i class='fa fa-close'></i> Cancel"
        }).then(res=>{
          if(res.value){
              $("#logout-form").submit();
          }
        });
      }
    </script>
    @yield('script')
</body>
</html>
