@component('mail::message')
# Website Contact Message

**From:** {{ $sender }}<br>
**Email:** {{ $sender_email }}<br>
**Phone number:** {{ $phone_number }}

{{ $message_text }}


@endcomponent