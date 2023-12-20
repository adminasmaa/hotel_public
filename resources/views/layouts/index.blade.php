@extends('layouts.admin')
@section('title', 'لوحة التحكم')

@section('content')


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 xl-100 box-col-12">
                <div class="widget-joins card">

                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon bg-light-warning">
                                            <svg class="fill-secondary" width="48" height="48" viewBox="0 0 48 48"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M22.5938 14.1562V17.2278C20.9604 17.8102 19.7812 19.3566 19.7812 21.1875C19.7812 23.5138 21.6737 25.4062 24 25.4062C24.7759 25.4062 25.4062 26.0366 25.4062 26.8125C25.4062 27.5884 24.7759 28.2188 24 28.2188C23.2241 28.2188 22.5938 27.5884 22.5938 26.8125H19.7812C19.7812 28.6434 20.9604 30.1898 22.5938 30.7722V33.8438H25.4062V30.7722C27.0396 30.1898 28.2188 28.6434 28.2188 26.8125C28.2188 24.4862 26.3263 22.5938 24 22.5938C23.2241 22.5938 22.5938 21.9634 22.5938 21.1875C22.5938 20.4116 23.2241 19.7812 24 19.7812C24.7759 19.7812 25.4062 20.4116 25.4062 21.1875H28.2188C28.2188 19.3566 27.0396 17.8102 25.4062 17.2278V14.1562H22.5938Z">
                                                </path>
                                                <path
                                                    d="M25.4062 0V11.4859C31.2498 12.1433 35.8642 16.7579 36.5232 22.5938H48C47.2954 10.5189 37.4829 0.704531 25.4062 0Z">
                                                </path>
                                                <path
                                                    d="M14.1556 31.8558C12.4237 29.6903 11.3438 26.9823 11.3438 24C11.3438 17.5025 16.283 12.1958 22.5938 11.4859V0C10.0492 0.731813 0 11.2718 0 24C0 30.0952 2.39381 35.6398 6.14897 39.8624L14.1556 31.8558Z">
                                                </path>
                                                <path
                                                    d="M47.9977 25.4062H36.5143C35.8044 31.717 30.4977 36.6562 24.0002 36.6562C21.0179 36.6562 18.3099 35.5763 16.1444 33.8444L8.13779 41.851C12.3604 45.6062 17.905 48 24.0002 48C36.7284 48 47.2659 37.9508 47.9977 25.4062Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h6>المتوفر</h6>
                                        </div>
                                    </div>
                                    <h5>783</h5>
                                    <div class="icon-bg">
                                        <svg class="fill-secondary" width="48" height="48" viewBox="0 0 48 48"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22.5938 14.1562V17.2278C20.9604 17.8102 19.7812 19.3566 19.7812 21.1875C19.7812 23.5138 21.6737 25.4062 24 25.4062C24.7759 25.4062 25.4062 26.0366 25.4062 26.8125C25.4062 27.5884 24.7759 28.2188 24 28.2188C23.2241 28.2188 22.5938 27.5884 22.5938 26.8125H19.7812C19.7812 28.6434 20.9604 30.1898 22.5938 30.7722V33.8438H25.4062V30.7722C27.0396 30.1898 28.2188 28.6434 28.2188 26.8125C28.2188 24.4862 26.3263 22.5938 24 22.5938C23.2241 22.5938 22.5938 21.9634 22.5938 21.1875C22.5938 20.4116 23.2241 19.7812 24 19.7812C24.7759 19.7812 25.4062 20.4116 25.4062 21.1875H28.2188C28.2188 19.3566 27.0396 17.8102 25.4062 17.2278V14.1562H22.5938Z">
                                            </path>
                                            <path
                                                d="M25.4062 0V11.4859C31.2498 12.1433 35.8642 16.7579 36.5232 22.5938H48C47.2954 10.5189 37.4829 0.704531 25.4062 0Z">
                                            </path>
                                            <path
                                                d="M14.1556 31.8558C12.4237 29.6903 11.3438 26.9823 11.3438 24C11.3438 17.5025 16.283 12.1958 22.5938 11.4859V0C10.0492 0.731813 0 11.2718 0 24C0 30.0952 2.39381 35.6398 6.14897 39.8624L14.1556 31.8558Z">
                                            </path>
                                            <path
                                                d="M47.9977 25.4062H36.5143C35.8044 31.717 30.4977 36.6562 24.0002 36.6562C21.0179 36.6562 18.3099 35.5763 16.1444 33.8444L8.13779 41.851C12.3604 45.6062 17.905 48 24.0002 48C36.7284 48 47.2659 37.9508 47.9977 25.4062Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon bg-light-warning">
                                            <svg class="fill-warning" width="98" height="98" viewBox="0 0 98 98"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.35 84H12.25V77.1167C12.25 61.5883 25.4677 49 41.7725 49C25.4677 49 12.25 36.4117 12.25 20.8833V14H7.35C3.29525 14 0 10.8617 0 7C0 3.13833 3.29525 0 7.35 0H90.65C94.7047 0 98 3.13833 98 7C98 10.8617 94.7047 14 90.65 14H85.75V20.8833C85.75 36.4117 72.5323 49 56.2275 49C72.5323 49 85.75 61.5883 85.75 77.1167V84H90.65C94.7047 84 98 87.1383 98 91C98 94.8617 94.7047 98 90.65 98H7.35C3.29525 98 0 94.8617 0 91C0 87.1383 3.29525 84 7.35 84ZM77.0893 22.6567C77.1505 22.0733 77.175 21.4783 77.175 20.8833V14H20.825V20.8833C20.825 21.4783 20.8495 22.0733 20.9108 22.6567C25.48 27.51 36.3335 30.9167 49 30.9167C61.6665 30.9167 72.52 27.51 77.0893 22.6567ZM56.2275 57.1667H41.7725C30.2207 57.1667 20.825 66.115 20.825 77.1167V77.9567C25.3575 72.9517 36.26 69.4167 49 69.4167C61.74 69.4167 72.6425 72.9517 77.175 77.9567V77.1167C77.175 66.115 67.7793 57.1667 56.2275 57.1667Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h6>الحركات</h6>
                                        </div>
                                    </div>
                                    <h5>783</h5>
                                    <div class="icon-bg">
                                        <svg width="98" height="98" viewBox="0 0 98 98"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.35 84H12.25V77.1167C12.25 61.5883 25.4677 49 41.7725 49C25.4677 49 12.25 36.4117 12.25 20.8833V14H7.35C3.29525 14 0 10.8617 0 7C0 3.13833 3.29525 0 7.35 0H90.65C94.7047 0 98 3.13833 98 7C98 10.8617 94.7047 14 90.65 14H85.75V20.8833C85.75 36.4117 72.5323 49 56.2275 49C72.5323 49 85.75 61.5883 85.75 77.1167V84H90.65C94.7047 84 98 87.1383 98 91C98 94.8617 94.7047 98 90.65 98H7.35C3.29525 98 0 94.8617 0 91C0 87.1383 3.29525 84 7.35 84ZM77.0893 22.6567C77.1505 22.0733 77.175 21.4783 77.175 20.8833V14H20.825V20.8833C20.825 21.4783 20.8495 22.0733 20.9108 22.6567C25.48 27.51 36.3335 30.9167 49 30.9167C61.6665 30.9167 72.52 27.51 77.0893 22.6567ZM56.2275 57.1667H41.7725C30.2207 57.1667 20.825 66.115 20.825 77.1167V77.9567C25.3575 72.9517 36.26 69.4167 49 69.4167C61.74 69.4167 72.6425 72.9517 77.175 77.9567V77.1167C77.175 66.115 67.7793 57.1667 56.2275 57.1667Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon bg-light-primary">
                                            <svg class="fill-primary" width="98" height="98" viewBox="0 0 98 98"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.35 84H12.25V77.1167C12.25 61.5883 25.4677 49 41.7725 49C25.4677 49 12.25 36.4117 12.25 20.8833V14H7.35C3.29525 14 0 10.8617 0 7C0 3.13833 3.29525 0 7.35 0H90.65C94.7047 0 98 3.13833 98 7C98 10.8617 94.7047 14 90.65 14H85.75V20.8833C85.75 36.4117 72.5323 49 56.2275 49C72.5323 49 85.75 61.5883 85.75 77.1167V84H90.65C94.7047 84 98 87.1383 98 91C98 94.8617 94.7047 98 90.65 98H7.35C3.29525 98 0 94.8617 0 91C0 87.1383 3.29525 84 7.35 84ZM77.0893 22.6567C77.1505 22.0733 77.175 21.4783 77.175 20.8833V14H20.825V20.8833C20.825 21.4783 20.8495 22.0733 20.9108 22.6567C25.48 27.51 36.3335 30.9167 49 30.9167C61.6665 30.9167 72.52 27.51 77.0893 22.6567ZM56.2275 57.1667H41.7725C30.2207 57.1667 20.825 66.115 20.825 77.1167V77.9567C25.3575 72.9517 36.26 69.4167 49 69.4167C61.74 69.4167 72.6425 72.9517 77.175 77.9567V77.1167C77.175 66.115 67.7793 57.1667 56.2275 57.1667Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h6>الشقق المؤجرة</h6>
                                        </div>
                                    </div>
                                    <h5>783</h5>
                                    <div class="icon-bg">
                                        <svg width="98" height="98" viewBox="0 0 98 98"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.35 84H12.25V77.1167C12.25 61.5883 25.4677 49 41.7725 49C25.4677 49 12.25 36.4117 12.25 20.8833V14H7.35C3.29525 14 0 10.8617 0 7C0 3.13833 3.29525 0 7.35 0H90.65C94.7047 0 98 3.13833 98 7C98 10.8617 94.7047 14 90.65 14H85.75V20.8833C85.75 36.4117 72.5323 49 56.2275 49C72.5323 49 85.75 61.5883 85.75 77.1167V84H90.65C94.7047 84 98 87.1383 98 91C98 94.8617 94.7047 98 90.65 98H7.35C3.29525 98 0 94.8617 0 91C0 87.1383 3.29525 84 7.35 84ZM77.0893 22.6567C77.1505 22.0733 77.175 21.4783 77.175 20.8833V14H20.825V20.8833C20.825 21.4783 20.8495 22.0733 20.9108 22.6567C25.48 27.51 36.3335 30.9167 49 30.9167C61.6665 30.9167 72.52 27.51 77.0893 22.6567ZM56.2275 57.1667H41.7725C30.2207 57.1667 20.825 66.115 20.825 77.1167V77.9567C25.3575 72.9517 36.26 69.4167 49 69.4167C61.74 69.4167 72.6425 72.9517 77.175 77.9567V77.1167C77.175 66.115 67.7793 57.1667 56.2275 57.1667Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon bg-light-success">
                                            <svg class="fill-success" width="98" height="98" viewBox="0 0 98 98"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.35 84H12.25V77.1167C12.25 61.5883 25.4677 49 41.7725 49C25.4677 49 12.25 36.4117 12.25 20.8833V14H7.35C3.29525 14 0 10.8617 0 7C0 3.13833 3.29525 0 7.35 0H90.65C94.7047 0 98 3.13833 98 7C98 10.8617 94.7047 14 90.65 14H85.75V20.8833C85.75 36.4117 72.5323 49 56.2275 49C72.5323 49 85.75 61.5883 85.75 77.1167V84H90.65C94.7047 84 98 87.1383 98 91C98 94.8617 94.7047 98 90.65 98H7.35C3.29525 98 0 94.8617 0 91C0 87.1383 3.29525 84 7.35 84ZM77.0893 22.6567C77.1505 22.0733 77.175 21.4783 77.175 20.8833V14H20.825V20.8833C20.825 21.4783 20.8495 22.0733 20.9108 22.6567C25.48 27.51 36.3335 30.9167 49 30.9167C61.6665 30.9167 72.52 27.51 77.0893 22.6567ZM56.2275 57.1667H41.7725C30.2207 57.1667 20.825 66.115 20.825 77.1167V77.9567C25.3575 72.9517 36.26 69.4167 49 69.4167C61.74 69.4167 72.6425 72.9517 77.175 77.9567V77.1167C77.175 66.115 67.7793 57.1667 56.2275 57.1667Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h6> الحجوزات</h6>
                                        </div>
                                    </div>
                                    <h5>783</h5>
                                    <div class="icon-bg">
                                        <svg width="98" height="98" viewBox="0 0 98 98"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.35 84H12.25V77.1167C12.25 61.5883 25.4677 49 41.7725 49C25.4677 49 12.25 36.4117 12.25 20.8833V14H7.35C3.29525 14 0 10.8617 0 7C0 3.13833 3.29525 0 7.35 0H90.65C94.7047 0 98 3.13833 98 7C98 10.8617 94.7047 14 90.65 14H85.75V20.8833C85.75 36.4117 72.5323 49 56.2275 49C72.5323 49 85.75 61.5883 85.75 77.1167V84H90.65C94.7047 84 98 87.1383 98 91C98 94.8617 94.7047 98 90.65 98H7.35C3.29525 98 0 94.8617 0 91C0 87.1383 3.29525 84 7.35 84ZM77.0893 22.6567C77.1505 22.0733 77.175 21.4783 77.175 20.8833V14H20.825V20.8833C20.825 21.4783 20.8495 22.0733 20.9108 22.6567C25.48 27.51 36.3335 30.9167 49 30.9167C61.6665 30.9167 72.52 27.51 77.0893 22.6567ZM56.2275 57.1667H41.7725C30.2207 57.1667 20.825 66.115 20.825 77.1167V77.9567C25.3575 72.9517 36.26 69.4167 49 69.4167C61.74 69.4167 72.6425 72.9517 77.175 77.9567V77.1167C77.175 66.115 67.7793 57.1667 56.2275 57.1667Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon bg-light-danger">
                                            <svg class="fill-danger" width="98" height="98" viewBox="0 0 98 98"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.35 84H12.25V77.1167C12.25 61.5883 25.4677 49 41.7725 49C25.4677 49 12.25 36.4117 12.25 20.8833V14H7.35C3.29525 14 0 10.8617 0 7C0 3.13833 3.29525 0 7.35 0H90.65C94.7047 0 98 3.13833 98 7C98 10.8617 94.7047 14 90.65 14H85.75V20.8833C85.75 36.4117 72.5323 49 56.2275 49C72.5323 49 85.75 61.5883 85.75 77.1167V84H90.65C94.7047 84 98 87.1383 98 91C98 94.8617 94.7047 98 90.65 98H7.35C3.29525 98 0 94.8617 0 91C0 87.1383 3.29525 84 7.35 84ZM77.0893 22.6567C77.1505 22.0733 77.175 21.4783 77.175 20.8833V14H20.825V20.8833C20.825 21.4783 20.8495 22.0733 20.9108 22.6567C25.48 27.51 36.3335 30.9167 49 30.9167C61.6665 30.9167 72.52 27.51 77.0893 22.6567ZM56.2275 57.1667H41.7725C30.2207 57.1667 20.825 66.115 20.825 77.1167V77.9567C25.3575 72.9517 36.26 69.4167 49 69.4167C61.74 69.4167 72.6425 72.9517 77.175 77.9567V77.1167C77.175 66.115 67.7793 57.1667 56.2275 57.1667Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h6> المتأخرين</h6>
                                        </div>
                                    </div>
                                    <h5>783</h5>
                                    <div class="icon-bg">
                                        <svg width="98" height="98" viewBox="0 0 98 98"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.35 84H12.25V77.1167C12.25 61.5883 25.4677 49 41.7725 49C25.4677 49 12.25 36.4117 12.25 20.8833V14H7.35C3.29525 14 0 10.8617 0 7C0 3.13833 3.29525 0 7.35 0H90.65C94.7047 0 98 3.13833 98 7C98 10.8617 94.7047 14 90.65 14H85.75V20.8833C85.75 36.4117 72.5323 49 56.2275 49C72.5323 49 85.75 61.5883 85.75 77.1167V84H90.65C94.7047 84 98 87.1383 98 91C98 94.8617 94.7047 98 90.65 98H7.35C3.29525 98 0 94.8617 0 91C0 87.1383 3.29525 84 7.35 84ZM77.0893 22.6567C77.1505 22.0733 77.175 21.4783 77.175 20.8833V14H20.825V20.8833C20.825 21.4783 20.8495 22.0733 20.9108 22.6567C25.48 27.51 36.3335 30.9167 49 30.9167C61.6665 30.9167 72.52 27.51 77.0893 22.6567ZM56.2275 57.1667H41.7725C30.2207 57.1667 20.825 66.115 20.825 77.1167V77.9567C25.3575 72.9517 36.26 69.4167 49 69.4167C61.74 69.4167 72.6425 72.9517 77.175 77.9567V77.1167C77.175 66.115 67.7793 57.1667 56.2275 57.1667Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

       <?php

        if (Session::get('branch') && Session::get('branch') != null)
        {
            $apart_types = App\Models\Apartment\ApartType::where('branch_id', Session::get('branch'))
                ->distinct()
                ->get();

            $apartments = array();
            if(!empty($apart_types) !=null){
                foreach ($apart_types as $one_type) {
                $get_apart = App\Models\Apartment\Apartment::where('type_id', $one_type->id)->get()->toArray();
                foreach ($get_apart as $key) {
                     array_push($apartments, $key);
                }

            }
?>



      <div class="row">
            <div class="col-xl-12 xl-100 box-col-12">
                <div class="widget-joins card">

                    <div class="card-body">
                        <div class="row gy-4">

      <?php
                                    //    $apartments=$apartments[0];
                                         foreach($apartments as $apartment) {
                                         $status=   $apartment['status'];
                                              if($status=='available') $get_c='green';
                                              if($status=='leave_today') $get_c='yellow';
                                              if($status=='clean') $get_c='gray';
                                              if($status=='maintain') $get_c='#c3aeae';
                                              if($status=='busy') $get_c='red';
                                              if($status=='late') $get_c='blue';

                                            ?>
                            <div class="col-sm-3">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon " style="background-color: <?=$get_c?>"><i
                                                class="icofont icofont-arrow-down" style="background-color: <?=$get_c?>"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6>شقة {{$apartment['name']}}  </h6>
                                        </div>
                                    </div>
                              @php

                             echo ($status=='available'?'متاح':'');
                             echo ($status=='leave_today'?'خروج اليوم':'');
                             echo ($status=='clean'?'نظافة':'');
                             echo ($status=='maintain'?'صيانة':'');
                             echo ($status=='busy'?'مشغول':'');
                             echo ($status=='late'?'متأخر':'');
                              @endphp

                                    <span class="counter">
                                        <?php if($status=='available') { ?> <a href="<?=url('/bookings/'.$apartment['id'])?>" style="float: left;" >تسكين</a> <?php } ?>
                                        </span>
                                    <span class="font-roboto">
                                        <span   class="font-danger"></span> </span>
                                </div>
                            </div>
@php  }  @endphp


                        </div>

                    </div>
                </div>
            </div>





        </div>


        <div class="row">
            <div class="col-xl-12 xl-100 box-col-12">
                <div class="widget-joins card">

                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon " >
                                        </div>
                                        <div class="widget-icon"  style="background-color: green">
                                        </div>
                                        <div class="media-body" >
                                            <h6>المتاح</h6>
                                        </div>
                                    </div>
                                    <div class="icon-bg">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon"  style="background-color: yellow">
                                        </div>
                                        <div class="media-body">
                                            <h6>خروج اليوم</h6>
                                        </div>
                                    </div>
                                    <div class="icon-bg">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon"  style="background-color: gray">
                                        </div>
                                        <div class="media-body">
                                            <h6>تنظيف</h6>
                                        </div>
                                    </div>
                                    <div class="icon-bg">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon"  style="background-color: #c3aeae">
                                        </div>
                                        <div class="media-body">
                                            <h6>صيانة</h6>
                                        </div>
                                    </div>
                                    <div class="icon-bg">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon"  style="background-color: red">
                                        </div>
                                        <div class="media-body">
                                            <h6>مشغول</h6>
                                        </div>
                                    </div>
                                    <div class="icon-bg">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="widget-card">
                                    <div class="media align-self-center">
                                        <div class="widget-icon"  style="background-color: blue">
                                        </div>
                                        <div class="media-body">
                                            <h6>متأخر</h6>
                                        </div>
                                    </div>
                                    <div class="icon-bg">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>





    @php } }   @endphp



        </div>


    <!-- Container-fluid Ends-->

@endsection
@section('scripts')
    <script>

        // set session for user not admin login
        $(document).ready(function () {
            let branch_user_login='{{auth()->user()->branch_id}}';
            if(branch_user_login !=1){

                SetBranchSession(branch_user_login) ;

            }

        })



    </script>

    <!-- latest jquery-->






    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/chart-custom.js') }}"></script>

@endsection

<!--end chart js-->

<!-- Plugin used-->
