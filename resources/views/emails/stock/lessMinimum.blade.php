@component('mail::message')
    # Olá

    O estoque de {{$product->name}} está abaixo do minimo permitido.

    Estoque Atual: {{$product->stock}}

    Estoque Minimo: {{ intval($product->stock_maximum * 0.1) }}

    Obrigado,<br>
    {{ config('app.name') }}
@endcomponent