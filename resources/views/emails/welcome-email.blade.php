@component('mail::message')
# Welcome to netWash online laundry services.

Thank you for choosing us...

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
