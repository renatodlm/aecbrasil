<?php get_header(); ?>
<section class="carrinho">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="carrinho-topo d-flex align-items-center justify-content-between">
          <h1 class="carrinho-title">
            Compar
          </h1>
          <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="cart-container">
          <div class="wrap cf">
            <div class="cart px-3">
              <div class="row">
                <ul class="tableHead">
                  <li class="prodHeader col-sm-6 col-md-9">Plano Escolhido</li>
                  <li class="col-sm">Preço</li>
                  <li class="col-sm">Total</li>
                </ul>
              </div>
              <ul class="cartWrap">
                <li class="items row">
                  <div class="infoWrap row mx-0 d-flex align-items-center">
                    <div class="col pr-0 pr-md-3 col-sm-6 col-md-9 prodTitleName">
                      Básico
                    </div>
                    <div class="col px-0 pl-md-3 col-sm prodPrice">
                      $ 60 anual
                    </div>

                    <div class="col pl-0 pl-md-3 col-sm prodTotal">
                      R$ 300,00
                    </div>
                  </div>
                </li>
              </ul>
              <div class="row">
                <div class="cupom-container">
                  <input type="text" placeholder="Insira seu Cupom GoodPoker"><input type="submit" class="btn-1" value="Aplicar">
                </div>
              </div>
            </div>
            <div class="order-resume px-3">
              <h3 class="order-resume-title row">
                Resumo da Compra:
              </h3>
              <ul class="cartWrap">
                <li class="items row">
                  <div class="infoWrap row mx-0">
                    <div class="col-sm-6 col-md-9 prodTime">
                      Assinatura do Plano Básico (1 ano)
                    </div>
                    <div class="col-sm prodPrice px-0">
                      $ 60 <span> (Equivalente a $5 mensais)</span>
                    </div>

                  </div>
                </li>
                <li class="items row">
                  <div class="infoWrap row mx-0 d-flex align-items-center justify-content-md-between px-3">
                    <div class="total-row-title prodTitle d-inline-flex">
                      Total:
                    </div>
                    <div class="total-row-price prodPrice total px-0 d-inline-flex ml-3">
                      $ 300 <span>(Equivalente a $5 mensais)</span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="order-resume px-3">
              <h3 class="order-resume-title row">
                Pague com:
              </h3>
              <ul class="cartWrap m-0">
                <li class="items row">
                  <div class="infoWrap row mx-0 d-flex align-items-center">
                    <div class="col col-sm-6 col-md-10 prodTitle">
                      <input type="radio" id="paypal" name="method" value="paypal">
                      <label for="paypal">Paypal</label>
                    </div>
                    <div class="col col-sm prodPrice text-right">
                      R$ 300,00
                    </div>
                  </div>
                </li>
                <li class="items row">
                  <div class="infoWrap row mx-0 d-flex align-items-center">
                    <div class="col col-sm-6 col-md-10 prodTitle">
                      <input type="radio" id="pagseguro" name="method" value="pagseguro">
                      <label for="pagseguro">Pagseguro</label>
                    </div>
                    <div class="col col-sm prodPrice text-right">
                      R$ 300,00
                    </div>
                  </div>
                </li>
                <li class="items row">
                  <div class="infoWrap row mx-0 d-flex align-items-center">
                    <div class="col col-sm-6 col-md-10 prodTitle">
                      <input type="radio" id="neteller" name="method" value="neteller">
                      <label for="neteller">NetEller</label>
                    </div>
                    <div class="col col-sm prodPrice text-right">
                      R$ 300,00
                    </div>
                  </div>
                </li>
              </ul>
              <div class="row justify-content-md-end justify-content-center">
                <a class="bt-link" href="#">
                  <button class="btn-1 finalizar-compra">
                    Finalizar
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>

