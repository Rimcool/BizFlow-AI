<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fake Store</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    .card:hover {
      transform: scale(1.03);
      transition: 0.3s;
    }
    .product-price {
      color: #00C896;
      font-weight: 600;
    }
  </style>
</head>
<body>

<div class="container my-5">
  <h1 class="text-center mb-4">🛒 AI Powered Store with FakeStore API</h1>
  <div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="{{ $product['image'] }}" class="card-img-top p-3" style="height: 300px; object-fit: contain;" alt="{{ $product['title'] }}">
        <div class="card-body">
          <h5 class="card-title">{{ $product['title'] }}</h5>
          <p class="card-text">{{ Str::limit($product['description'], 100) }}</p>
          <p class="product-price">$ {{ $product['price'] }}</p>
          <button class="btn btn-primary w-100" onclick="addToCart('{{ $product['title'] }}')">Add to Cart</button>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<script>
  function addToCart(product) {
    alert(product + ' added to cart!');
    // Add cart logic here
  }
</script>

</body>
</html>
