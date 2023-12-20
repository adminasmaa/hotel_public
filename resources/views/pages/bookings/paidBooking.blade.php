      <div class="dt-ext table-responsive">
                                            <table class=" table display  data-table-responsive" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم العميل</th>
                                                        <th>التاريخ</th>
                                                        <th>اليوزر</th>   
                                                        <th>الحاله الدفع </th> 
                                                      
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($paidBookings as $booking)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>{{$booking->client->name}}</td>
                                                        <td>{{$booking->book_date}}</td>
                                                        <td>{{$booking->employee->user_name}}</td>
                                                        <td> 
                                                            تم الدفع  
                                                          
                                                        </td>                                                                                                 
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>