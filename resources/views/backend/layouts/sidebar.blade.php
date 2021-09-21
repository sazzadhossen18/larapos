@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp 


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{$route==('users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
              
            </ul>
          </li>
         
          <li class="nav-item {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{$route==('profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('profiles.password.view')}}" class="nav-link {{$route==('profiles.password.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change password</p>
                </a>
              </li>
            </ul>
          </li>


        <li class="nav-item {{($prefix=='/suppliers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Supplier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('suppliers.view')}}" class="nav-link {{$route==('suppliers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Supplier</p>
                </a>
              </li>
              
            </ul>
        </li>



         <li class="nav-item {{($prefix=='/customers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.view')}}" class="nav-link {{$route==('customers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('customers.credit')}}" class="nav-link {{$route==('customers.credit')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Customer</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{route('customers.paid')}}" class="nav-link {{$route==('customers.paid')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid Customer</p>
                </a>
            </li>

             <li class="nav-item">
              <a href="{{route('customers.wise.report')}}" class="nav-link {{$route==('customers.wise.report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Wise Report</p>
                </a>
            </li>
          

            
              
            </ul>
        </li>

         <li class="nav-item {{($prefix=='/units')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Unit
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('units.view')}}" class="nav-link {{$route==('units.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Unit</p>
                </a>
              </li>
              
            </ul>
        </li>


         <li class="nav-item {{($prefix=='/categorys')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categorys.view')}}" class="nav-link {{$route==('categorys.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
              
            </ul>
        </li>



         <li class="nav-item {{($prefix=='/products')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.view')}}" class="nav-link {{$route==('products.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p>
                </a>
              </li>
              
            </ul>
        </li>


         <li class="nav-item {{($prefix=='/purchases')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage Purchase 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('puschases.view')}}" class="nav-link {{$route==('puschases.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Purchase</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('puschases.pending')}}" class="nav-link {{$route==('puschases.pending')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Purchase</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('daily.report.purchases')}}" class="nav-link {{$route==('daily.report.purchases')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Purchase Report</p>
                </a>
              </li>



             
              
            </ul>
        </li>



         <li class="nav-item {{($prefix=='/invoices')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Invoice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoices.view')}}" class="nav-link {{$route==('invoices.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Invoice</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('invoices.pending')}}" class="nav-link {{$route==('invoices.pending')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Invoice</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('daily.report')}}" class="nav-link {{$route==('daily.report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Invoice Report</p>
                </a>
              </li>
              
            </ul>
        </li>

       <li class="nav-item {{($prefix=='/stocks')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Stock
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stocks.report')}}" class="nav-link {{$route==('stocks.report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Report</p>
                </a>
              </li>
              
            </ul>
          </li>








      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->