@component('mail::message')
# Legal Reauest Contract

Step approval contract request.
{{$user->email}}

@component('mail::button', ['url' => route('legal.approval.verify',[$user->id,$contract->id])])
Go to Request Contract
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
