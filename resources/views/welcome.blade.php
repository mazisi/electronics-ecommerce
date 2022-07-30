@extends('layouts.app')
@section('content')
  
<div class="body-content outer-top-ts" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      
            <div class="checkout-box faq-page">
            <div class="row">
              <div class="col-md-12">
                <h2 class="heading-title text-center">SHASHI INVESTIMENT (PTY) LTD</h2>
                <span class="title-tag">SHASHI Investment (PTY) LTD was started in Half 1 of 2017. It was the passion project of Mr Naeen
                  Ahmed and Ms Teja Somaru, 2 individuals who have a passion for people and who believe that
                  entrepreneurs are the ones who will collectively solve South Africa’s unemployment crisis, through
                  taking risks, driven by passion and genuine desire to make an impact . We are a proudly 1005 BBBEE
                  owned entity, powered by a diverse and unique team .We are fully VAT registered business, that
                  complies with operating and employment regulations as guided by the relevant regulatory bodies.</span>
                <div class="panel-group checkout-steps" id="accordion">
                  <!-- checkout-step-01  -->
      <div class="panel panel-default checkout-step-01">
      
        <!-- panel-heading -->
          <div class="panel-heading">
            <h4 class="unicase-checkout-title">
                <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                  <span>1</span>Who are we ?</a>
             </h4>
          </div>
          <!-- panel-heading -->
      
        <div id="collapseOne" class="panel-collapse collapse in">
      
          <!-- panel-body  -->
            <div class="panel-body">
              SHASHI Investment is made up of multiple entities, operating primarily with the FMCG, Retail and
Wholesale value chain. Focusing on product distribution, direct sales and merchandising services
within niche operating environment. “PEOPLE BUY FROM PEOPLE AND WHERE THEY ARE VALUED,
UNDERSTOOD AND WELCOMED” We help our retailers create diversity within their product lines,
thus encouraging diverse group of shoppers through their doors and thereby increasing sales
revenue and assisting value creating through product placement. From bred and associated food
products (officials distributor Nature’s Dream Bread, Freshly, to name a few brands) to home care,
beauty care and hardware, no products placement in retailers is beyond our reach. Head office
listing or not, let us work with you to connect your products to consumers via retailers. Our business
further comprises of a division specializing in the sales of IT Equipment, with a primary focus on
consumer products and consumables, mobile devices for the Tier 2 distribution market, and repair
services, Cross border FMCG goods trade, Commodity trading, a professional services practice with a
focus on business Strategy Consulting Services and Executive Coaching.
          </div>
          <!-- panel-body  -->
      
        </div><!-- row -->
      </div>
      <!-- checkout-step-01  -->
                    <!-- checkout-step-02  -->
                    <div class="panel panel-default checkout-step-02">
                      <div class="panel-heading">
                        <h4 class="unicase-checkout-title">
                          <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                            <span>2</span>What is our reach ?
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                          Our offices are located in Sandton, with a distribution network based across the greater Gauteng
region. We service customers country wide as well as our neighboring regions.
Our Retailer customers are serviced by a highly skilled customer management team who pride
themselves on service delivery
<h5>“UNDER PROMISE AND OVER DELIVER”</h5>
                        </div>
                      </div>
                    </div>
                    <!-- checkout-step-02  -->
      
                  <!-- checkout-step-03  -->
                    <div class="panel panel-default checkout-step-03">
                      <div class="panel-heading">
                        <h4 class="unicase-checkout-title">
                          <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
                             <span>3</span>How can we help You ?
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                          Speak to us today about allowing our skilled team to add your product to their basket of offerings, to
take to their vast client base. Allow us the opportunity to market your products and WATCH YOUR
SALES GROW, or speak to us about shelf positioning of your products. Let us work within our
network to see how we can improve your product placements and customer reach through
optimized placement opportunities structures in place for such engagement are such to be of
interest to you.
 </div>


                      </div>
                    </div>
                    
                </div><!-- /.checkout-steps -->
              </div>
            </div><!-- /.row -->
          </div>
              
      </div>
      </div>
     </div>


</div>
@if(session()->has('success'))
<script>
    function notify(message, type){
        $.growl({
            message: message
        },{
            type: type,
            allow_dismiss: false,
            label: 'Cancel',
            className: 'btn-xs btn-inverse',
            placement: {
                from: 'bottom',
                align: 'right'
            },
            delay: 2500,
            animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
            },
            offset: {
                x: 30,
                y: 30
            }
        });
    };

  notify('{{ session('success') }}', 'inverse');
</script>

@elseif (session('error'))

    <script>
        function notify(message, type){
            $.growl({
                message: message
            },{
                type: type,
                allow_dismiss: false,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'bottom',
                    align: 'right'
                },
                delay: 3000,
                animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };

      notify('{{ session('error') }}', 'inverse');   
    </script>
@endif
@endsection