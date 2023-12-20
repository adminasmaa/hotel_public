<?php

namespace App\Interface;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;

interface BookingRepositoryInterface
{
    public function index();
    public function store(BookingRequest $request);
    public function destroy(Booking $booking);
    public function show(Booking $booking);
    public function changeStatus($id);
    public function changeCase($id);
    public function create($id);

}
