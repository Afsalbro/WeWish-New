<x-mail::message>
# Introduction

{{$message}}

<x-mail::button :url="'{{$url}}'">
Join the Club
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
