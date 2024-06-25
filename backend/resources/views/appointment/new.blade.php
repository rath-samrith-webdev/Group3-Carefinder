<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.appointments.store')}}">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2">
                            <label for="title" class="text-gray-700 select-none font-medium">Title</label>
                            <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Appointment Title" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="description" class="text-gray-700 select-none font-medium">Information</label>
                            <div class="flex gap-2">
                                <select class="border border-gray-300  text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="hospital_id" >
                                    <option value="" disabled>Select Hospital</option>
                                    @foreach($data['hospitals'] as $hospital)
                                        <option value="{{$hospital->id}}" >{{$hospital->name}}</option>
                                    @endforeach
                                </select>
                                <div class="relative h-10">
                                    <input
                                        id="date-picker"
                                        value=""
                                        name="appointment_date"
                                        class="border border-gray-300  text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                                        placeholder="Select a Date"
                                    />
                                </div>
                                <select class="border border-gray-300  text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="doctor_id" >
                                    <option value="" disabled>Select Doctor</option>
                                    @foreach($data['doctors'] as $doctor)
                                        <option value="{{$doctor->id}}" >{{$doctor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232">
                                    <path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero" />
                                </svg>
                                <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="user_id" @if(auth()->id()!==1)disabled @endif>
                                    <option value="" disabled>Select Category</option>
                                    @foreach($data['users'] as $user)
                                        <option value="{{$user->id}}" @if($data['uid']==$user->id) selected  @endif>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center mt-16 mb-16">
                            <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    const datepicker = flatpickr("#date-picker", {});

    // styling the date picker
    const calendarContainer = datepicker.calendarContainer;
    const calendarMonthNav = datepicker.monthNav;
    const calendarNextMonthNav = datepicker.nextMonthNav;
    const calendarPrevMonthNav = datepicker.prevMonthNav;
    const calendarDaysContainer = datepicker.daysContainer;

    calendarContainer.className = `${calendarContainer.className} bg-white p-4 border border-blue-gray-50 rounded-lg shadow-lg shadow-blue-gray-500/10 font-sans text-sm font-normal text-blue-gray-500 focus:outline-none break-words whitespace-normal`;

    calendarMonthNav.className = `${calendarMonthNav.className} flex items-center justify-between mb-4 [&>div.flatpickr-month]:-translate-y-3`;

    calendarNextMonthNav.className = `${calendarNextMonthNav.className} absolute !top-2.5 !right-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;

    calendarPrevMonthNav.className = `${calendarPrevMonthNav.className} absolute !top-2.5 !left-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;

    calendarDaysContainer.className = `${calendarDaysContainer.className} [&_span.flatpickr-day]:!rounded-md [&_span.flatpickr-day.selected]:!bg-gray-900 [&_span.flatpickr-day.selected]:!border-gray-900`;
</script>
