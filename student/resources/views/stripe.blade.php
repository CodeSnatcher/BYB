<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('includes.header_script')
</head>

<body>
    <section class="my-5">
        <div class="container">
            <h1 class="text-center my-4 fs-1">Stripe Payment</h1>
            <div class="d-flex align-items-center gap-2 justify-content-center mt-5 pt-5">
                <a href="{{route('stripe.checkout',['price' => 10, 'product' => 'platinum'])}}">
                    <div class="card p-3 border">
                        <h2 class="text-dark  ">Platinum</h2>
                    </div>
                </a>
                <a href="{{route('stripe.checkout',['price' => 50, 'product' => 'silver'])}}">
                    <div class="card p-3 border">
                        <h2 class="text-dark  ">Silver</h2>
                    </div>
                </a>
                <a href="{{route('stripe.checkout',['price' => 100, 'product' => 'gold'])}}">
                    <div class="card p-3 border">
                        <h2 class="text-dark  ">Gold</h2>
                    </div>
                </a>
            </div>
        </div>
    </section>
    @include('includes.footer_script')
</body>

</html>