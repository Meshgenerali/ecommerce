<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order body</title>
</head>
<body>
    <h1>Order details</h1>

    Customer name :<h3>{{$order->name}}</h3>
    Customer email :<h3>{{$order->email}}</h3>
    Customer mobile :<h3>{{$order->phone}}</h3>
    Customer address :<h3>{{$order->address}}</h3>
    Customer id :<h3>{{$order->user_id}}</h3>

    Product title :<h1>{{$order->product_title}}</h1>
    Quanity :<h1>{{$order->quantity}}</h1>
    Price :<h1>${{$order->price}}</h1>

    <br> <br>

    <img width="300px" src="product/{{$order->image}}" alt="">
</body>
</html>