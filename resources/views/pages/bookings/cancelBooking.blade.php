      <div class="dt-ext table-responsive">
                                            <table class=" table display  data-table-responsive" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم العميل</th>
                                                        <th>التاريخ</th>
                                                        <th>اليوزر</th>   
                                                      
                                                        <th class="not-export-col">الاعدادت</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($cancelBookings as $booking)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>{{$booking->client->name}}</td>
                                                        <td>{{$booking->book_date}}</td>
                                                        <td>{{$booking->employee->user_name}}</td>
                                                   
                                                   
                                                       
                                                        <td class="not-export-col">
                                                        

                                                            <a href="{{route('bookings.show',$booking->id)}}" data-id="{{$booking->id}}"  id="edit_id" class="me-2"  width="15" height='15'>
                                                            <i data-feather="eye"  width="15" height='15'></i>
                                                            </a>
                                                            
                                                            <form action="{{ route('bookings.destroy', $booking->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button  style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                type="submit" data-toggle="tooltip" data-placement="top" title="{{ __('delete') }}"
                                                                    onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                                                    class="me-2"><i data-feather="trash-2"  width="15" height='15'></i>
                                                                </button>
                                                            </form>    
                                                        </td>
                                                      

                                            
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>