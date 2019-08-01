@extends("layouts.app")

@section("title")
  GREENDR - Home
@endsection

@section('content')

{{-- @dd($articulos); --}}

@guest

  <section class="section_onBoarding">

  <!-- on boarding mobile -->
  <div id="mobile_boarding" class="mobile_boarding">

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

    <!-- <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div> -->

  <div class="carousel-item active">
    <article class="product onBoarding mobile d-block w-100">
      <a class="odio onBoarding_a" href="/que_es_greendr">
        <img class="photo onBoarding_photo" src="/media/onboarding/obA.png" alt="obA">
        <div class="texto onBoarding_texto">
          <h2 class="onBoarding_h2">QUÉ ES GREENDR</h2>
        </div>
      </a>
    </article>
  </div>

  <div class="carousel-item">
      <article class="product onBoarding mobile d-block w-100">
        <a class="odio onBoarding_a" href="/como_funciona">
          <img class="photo onBoarding_photo" src="/media/onboarding/obB.png" alt="obB">
          <div class="texto onBoarding_texto">
            <h2 class="onBoarding_h2">CÓMO INTERCAMBIAR PLANTAS</h2>
          </div>
        </a>
      </article>
  </div>

  <div class="carousel-item">
      <article class="product onBoarding mobile d-block w-100">
        <a class="odio onBoarding_a" href="{{ route('register') }}">
          <img class="photo onBoarding_photo" src="/media/onboarding/obC.png" alt="obC">
          <div class="texto onBoarding_texto">
            <h2 class="onBoarding_h2">REGISTRATE ACÁ</h2>
          </div>
        </a>
      </article>
  </div>

  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>

  </div>

  <!-- on boarding tablet -->
  <article class="product onBoarding tablet">
  <a class="odio onBoarding_a" href="/que_es_como_funciona">
    <img class="photo onBoarding_photo" src="/media/onboarding/obA.png" alt="obA">
    <div class="texto onBoarding_texto">
      <h2 class="onBoarding_h2">QUÉ ES GREENDR</h2>
      <br>
      <h2 class="onBoarding_h2">CÓMO INTERCAMBIAR PLANTAS</h2>
    </div>
  </a>
  </article>

  <article class="product onBoarding tablet">
  <a class="odio onBoarding_a" href="{{ route('register') }}">
    <img class="photo onBoarding_photo" src="/media/onboarding/obC.png" alt="obC">
    <div class="texto onBoarding_texto">
      <h2 class="onBoarding_h2">REGISTRATE ACA</h2>
    </div>
  </a>
  </article>


  <!-- on boarding desktop   -->
      <article class="product onBoarding desktop">
        <a class="odio onBoarding_a" href="/que_es_greendr">
          <img class="photo onBoarding_photo" src="/media/onboarding/obA.png" alt="obA">
          <div class="texto onBoarding_texto">
            <h2 class="onBoarding_h2">QUÉ ES GREENDR</h2>
          </div>
        </a>
      </article>

      <article class="product onBoarding desktop">
        <a class="odio onBoarding_a" href="/como_funciona">
          <img class="photo onBoarding_photo" src="/media/onboarding/obB.png" alt="obB">
          <div class="texto onBoarding_texto">
            <h2 class="onBoarding_h2">CÓMO INTERCAMBIAR PLANTAS</h2>
          </div>
        </a>
      </article>

      <article class="product onBoarding desktop">
        <a class="odio onBoarding_a" href="{{ route('register') }}">
          <img class="photo onBoarding_photo" src="/media/onboarding/obC.png" alt="obC">
          <div class="texto onBoarding_texto">
            <h2 class="onBoarding_h2">REGISTRATE ACÁ</h2>
          </div>
        </a>
      </article>

  </section>

@endguest

<section class="main">


@foreach ($articulos as $key => $value)
{{-- @dd($value); --}}
			<article class="product">
      @guest
        <a class="odio" href="{{ route('login') }}">
        <img class="photo" src="/storage/articulos/{{$value->image1}}" alt="planta">
      @else
        <a class="odio" href="articulo/{{$value->id}}">
        <img class="photo" src="/storage/articulos/{{$value->image1}}" alt="planta">
      @endguest

          <div class="texto">
            <h3>{{$value->categoria->name}}</h3>
            <h2>{{$value->name}}</h2>
          </div>
        </a>
			</article>

@endforeach

		</section>

@endsection
