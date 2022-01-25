 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3"> Inventory </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('dashboard') }}"> <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>

     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>

     <!-- Pos -->

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#POS" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-user"></i>
             <span>POS</span>
         </a>
         <div id="POS" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('pos') }}">Pos</a>
                 <a class="collapse-item" href="{{ route('show_customer') }}">All Customer</a>
             </div>
         </div>
     </li>


     <!-- Employee Manage -->

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brand" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-users"></i>
             <span>Employees</span>
         </a>
         <div id="brand" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('add.employee') }}">Add Employee</a>
                 <a class="collapse-item" href="{{ route('show_employee') }}">All Employees <span
                         class=" ml-3  badge badge-success "> {{$employees_count}}</span> </a>
             </div>
         </div>
     </li>


     <!-- Customer Manage -->

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-user"></i>
             <span>Customers</span>
         </a>
         <div id="customer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('add_customer') }}">Add Customer</a>
                 <a class="collapse-item" href="{{ route('show_customer') }}">All Customer <span
                         class=" ml-3  badge badge-success ">{{$customer_count}}</span> </a>
             </div>
         </div>
     </li>



     <!-- Supplier Manage -->

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#supplier" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-users"></i>
             <span>Suppliers</span>
         </a>
         <div id="supplier" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('add_supplier') }}">Add Supplier</a>
                 <a class="collapse-item" href="{{ route('show_Supplier') }}">All Supplier <span
                         class=" ml-3  badge badge-success ">{{$supplier_count}}</span> </a>
             </div>
         </div>
     </li>




     <!-- Orders Manage -->

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-users"></i>
             <span>Orders Info</span>
         </a>
         <div id="order" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('order_manager') }}">Orders Manage</a>
                 <a class="collapse-item" href="{{ route('panding_orders') }}">Panding Orders <span
                         class="ml-2 badge  badge-success">{{$pending_orders_count}}</span> </a>
                 <a class="collapse-item" href="{{ route('aprove_orders') }}">Aprove Orders<span
                         class=" ml-3  badge badge-success ">{{$aprove_orders_count}}</span> </a>


             </div>
         </div>
     </li>


     <!-- -----------------------------------------------------Sales Report --------------------------------------------- -->


    

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Sales" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Sales Info</span>
         </a>
         <div id="Sales" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{route('today_sales')}}"> Today Sales </a>
                 <a class="collapse-item" href="{{route('yearly_sales')}}"> Yearly Sales </a>

                 <a type="submit" class="collapse-item dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton"
                     aria-haspopup="true" aria-expanded="false">Monthly Sales</a>

                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="{{route('month_sales','01')}}">January</a>
                     <a class="dropdown-item" href="{{route('month_sales','02')}}">Febuary</a>
                     <a class="dropdown-item" href="{{route('month_sales','03')}}">March</a>
                     <a class="dropdown-item" href="{{route('month_sales','04')}}">April</a>
                     <a class="dropdown-item" href="{{route('month_sales','05')}}">May</a>
                     <a class="dropdown-item" href="{{route('month_sales','06')}}">June</a>

                     <a class="dropdown-item" href="{{route('month_sales','07')}}">July</a>
                     <a class="dropdown-item" href="{{route('month_sales','08')}}">August</a>
                     <a class="dropdown-item" href="{{route('month_sales','09')}}">September</a>
                     <a class="dropdown-item" href="{{route('month_sales','10')}}">October</a>
                     <a class="dropdown-item" href="{{route('month_sales','11')}}">November</a>
                     <a class="dropdown-item" href="{{route('month_sales','12')}}">December</a>


                 </div>

             </div>
         </div>
     </li>



     <!-- Salary Manage -->

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#salary" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-users"></i>
             <span>Salary(EMP)</span>
         </a>
         <div id="salary" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('add_advance_salary') }}">Add Advance Salary</a>
                 <a class="collapse-item" href="{{ route('show_advance_salary') }}">All Advance Salary</a>
                 <a class="collapse-item" href="{{ route('pay_salary') }}">Pay Salary</a>


             </div>
         </div>
     </li>


     <!-- Nav Item - Category Addd -->

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Category" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Categories Info</span>
         </a>
         <div id="Category" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{route('category_form')}}">Category Add</a>
                 <a class="collapse-item" href="{{route('manage_category')}}">Category Manage</a>

             </div>
         </div>
     </li>


     <!-- Nav Item - Product Add -->


     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product_info" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Product Info</span>
         </a>
         <div id="product_info" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{route('product_form')}}">Product Add</a>
                 <a class="collapse-item" href="{{route('manage_product')}}">Product Manage <span
                         class=" ml-3  badge badge-success ">{{$product_count}}</span> </a>
                 <a class="collapse-item" href="{{route('import_product')}}">Product Import</a>


             </div>
         </div>
     </li>



     <!-- Nav Item - Exp -->

     <?php 

$January="January";    $July="July"; 
$Febuary="Febuary";    $August="August"; 
$March="March";        $September="September"; 
$April="April";        $October="October"; 
$May="May";            $November="November"; 
$June="June";           $December="December"; 

?>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#expense" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Expense Info</span>
         </a>
         <div id="expense" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{route('expense_form')}}">Expense Add </a>
                 <a class="collapse-item" href="{{route('today_expense')}}"> Today Expense </a>
                 <a class="collapse-item" href="{{route('year_expense')}}"> Yearly Expense </a>

                 <a type="submit" class="collapse-item dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton"
                     aria-haspopup="true" aria-expanded="false">Monthly Expense</a>

                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="{{route('month_expense',$January)}}">January</a>
                     <a class="dropdown-item" href="{{route('month_expense',$Febuary)}}">Febuary</a>
                     <a class="dropdown-item" href="{{route('month_expense',$March)}}">March</a>
                     <a class="dropdown-item" href="{{route('month_expense',$April)}}">April</a>
                     <a class="dropdown-item" href="{{route('month_expense',$May)}}">May</a>
                     <a class="dropdown-item" href="{{route('month_expense',$June)}}">June</a>

                     <a class="dropdown-item" href="{{route('month_expense',$July)}}">July</a>
                     <a class="dropdown-item" href="{{route('month_expense',$August)}}">August</a>
                     <a class="dropdown-item" href="{{route('month_expense',$September)}}">September</a>
                     <a class="dropdown-item" href="{{route('month_expense',$October)}}">October</a>
                     <a class="dropdown-item" href="{{route('month_expense',$November)}}">November</a>
                     <a class="dropdown-item" href="{{route('month_expense',$December)}}">December</a>


                 </div>

             </div>
         </div>
     </li>


    



     <!-- Attendence Report -->

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Attendence" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-user"></i>
             <span>Attendence</span>
         </a>
         <div id="Attendence" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('take_attendence') }}">Take Attendence </a>
                 <a class="collapse-item" href="{{ route('all_attendence') }}">All Attendence</a>
             </div>
         </div>
     </li>


     <!-- Setting  -->

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Setting" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-user"></i>
             <span>Setting</span>
         </a>
         <div id="Setting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('company_info_add') }}">Add Company Info</a>
                 <a class="collapse-item" href="{{ route('view_info') }}">View Company Info</a>
                 <a class="collapse-item" href="{{ route('edit_info') }}">Edit Company Info</a>


             </div>
         </div>
     </li>











     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
             aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Utilities</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Custom Utilities:</h6>
                 <a class="collapse-item" href="utilities-color.html">Colors</a>
                 <a class="collapse-item" href="utilities-border.html">Borders</a>
                 <a class="collapse-item" href="utilities-animation.html">Animations</a>
                 <a class="collapse-item" href="utilities-other.html">Other</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Addons
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
             aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Pages</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Login Screens:</h6>
                 <a class="collapse-item" href="login.html">Login</a>
                 <a class="collapse-item" href="register.html">Register</a>
                 <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                 <div class="collapse-divider"></div>
                 <h6 class="collapse-header">Other Pages:</h6>
                 <a class="collapse-item" href="404.html">404 Page</a>
                 <a class="collapse-item" href="blank.html">Blank Page</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="charts.html">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span></a>
     </li>

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="tables.html">
             <i class="fas fa-fw fa-table"></i>
             <span>Tables</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->