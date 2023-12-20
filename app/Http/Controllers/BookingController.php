<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Interface\BookingRepositoryInterface;
use App\Models\Booking;

class BookingController extends Controller
{
    private $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function index()
    {
        return $this->bookingRepository->index();
    }

    public function store(BookingRequest $request)
    {
        return $this->bookingRepository->store($request);
    }

    public function destroy(Booking $booking)
    {
        return $this->bookingRepository->destroy($booking);

    }
    public function show(Booking $booking)
    {

        return $this->bookingRepository->show($booking);

    }
    public function create($id)
    {
        return $this->bookingRepository->create($id);
    }

    public function changeStatus($id)
    {
        return $this->bookingRepository->changeStatus($id);

    }
    public function changeCase($id)
    {
        return $this->bookingRepository->changeCase($id);

    }

}
