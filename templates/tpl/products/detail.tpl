<main>
  <div class="container">
    <ul class="breadcumb">{include file='breadcumb.tpl'}</ul>
    <!-- Main content -->
    <div class="artseed-body">
      <div class="product-detail">
        <div class="product-detail__left">

          {if $product_images|@count > 0}
          <div class="product-gallery">
            <div class="slider-for">
              {foreach from=$product_images item=item key=k}
              <a class="image-main" data-color-code="{$item.color_code}" data-index="{$k}" data-fancybox="gallery" href="{$item.img_vn}">
                <img src="{$item.img_vn}?width=350&height=350&mode=contain" title="{$item.name_detail}" alt="{$item.name_detail}" class="img-scale" loading="lazy">
              </a>
              {/foreach}
            </div>
            <div class="slider-nav">
              {foreach from=$product_images item=item key=k}
              <div class="image-item" data-color-code="{$item.color_code}" data-index="{$k}">
                <img src="{$item.img_vn}?width=140&height=140&mode=contain" title="{$item.name_detail}" alt="{$item.name_detail}" class="img-scale" loading="lazy">
              </div>
              {/foreach}
            </div>
          </div>
          {else}
          <div class="image-detail">
            <img src="/{$detail.img_thumb_vn}?width=400&height=400&mode=scale" title="{$detail.name_detail}" alt="{$detail.name_detail}" class="img-scale" loading="lazy">
          </div>
          {/if}
        </div>
        <div class="product-detail__meta" id="product-sidebar">
          <h1 class="ttl01" itemprop="headline">{$detail.name}</h1>


          {if empty($product_codes)}
          <div class="product-price --detail">
            {if $detail.price > 0}
            <span class="price-current">{$detail.price_formatted} ₫</span>
            {else}
            <span class="price-current">Liên hệ</span>
            {/if}
            {if $detail.priceold > 0}
            <span class="price-old">{$detail.priceold_formatted} ₫</span>
            {/if}
            {if $detail.price > 0 && $detail.priceold > 0 && $detail.priceold > $detail.price}
            {math equation="(a - b) / a * 100" a=$detail.priceold b=$detail.price assign="discount"}
            <span class="discount --detail">-{$discount|round:0}%</span>
            {/if}
          </div>
          {/if}
          {if !empty($product_codes)}
          <div class="product-variants">
            {* GIÁ *}
            <div class="product-price-codes" id="product-price">
              {assign var=firstPrice value=$product_codes[0].variants[0].price_formatted}
              {$firstPrice}

            </div>

            {* DANH SÁCH MÀU THEO MÃ *}
            <div class="product-variants-color">Màu sắc</div>
            {foreach from=$product_codes item=code name=codeContent}
            <div class="variant-box {if !$smarty.foreach.codeContent.first}hidden{/if}"
              data-code-id="{$code.id}">
              <div class="color-list">
                {foreach from=$code.variants item=v name=colorLoop}
                <div
                  class="color-item {if $smarty.foreach.colorLoop.first}active{/if}"
                  data-price="{$v.price}"
                  data-price-formatted="{$v.price_formatted}"
                  data-color-code="{$v.color_code}">
                  <span class="color-dot" style="background:{$v.color_code}"></span>
                  {$v.color_name}
                </div>
                {/foreach}
              </div>

            </div>
            {/foreach}
            {* TAB MÃ SẢN PHẨM *}
            <div class="product-variants-color">Mã sản phẩm</div>
            <div class="code-tabs">
              {foreach from=$product_codes item=code name=codeLoop}
              <button
                class="code-tab {if $smarty.foreach.codeLoop.first}active{/if}"
                data-code-id="{$code.id}">
                {$code.code}
              </button>
              {/foreach}
            </div>
          </div>
          {/if}

          <div class="p-commit">
            {foreach from=$commit item=item}
            <div class="commit-item">
              <div class="commit-item__img">
                <img src="{$item.img_thumb_vn}" alt="{$item.name_detail}" class="img-cover" loading="lazy">

              </div>
              <div class="commit-item__meta">
                <h3>{$item.name_detail}</h3>
                {$item.short}
              </div>
            </div>
            {/foreach}
          </div>
          <form id="product-order-form">
            <input type="hidden" name="product_id" value="{$detail.articlelist_id}">
            <!-- {if $colors|@count > 0}
            <div class="box-colors box-attribute">
              <label class="box-attribute__ttl">Màu sắc <span id="color-name"></span></label>
              <div class="box-attribute__lst">
                {foreach from=$colors item=item}
                <label class="box-attribute__lst__item">
                  <input type="radio" name="colorids[]" value="{$item.id}" data-name="{$item.name}">
                  <span class="cuz-att"><span class="bg-color" style="background:{$item.code}"></span></span>
                </label>
                {/foreach}
              </div>
            </div>
            {/if} -->
            <!-- {if $sizes|@count > 0}
            <div class="box-sizes box-attribute">
              <label class="box-attribute__ttl">Kích thước <span id="size-name"></span></label>
              <div class="box-attribute__lst">
                {foreach from=$sizes item=item}
                <label class="box-attribute__lst__item">
                  <input type="radio" name="sizeids[]" value="{$item.id}" data-name="{$item.name}">
                  <span class="cuz-att"><span class="bg-color">{$item.name}</span></span>
                </label>
                {/foreach}
              </div>
            </div>
            {/if} -->
            <!-- <div class="box-order">
              <div class="c-quantity">
                <button type="button" class="c-quantity-btn minus">−</button>
                <input type="number" name="quantity" value="1" min="1">
                <button type="button" class="c-quantity-btn plus">+</button>
              </div>
              <div class="product-detail__buttons">
                <button type="button" class="btn-cart btn-add-cart" data-id="{$detail.articlelist_id}">Thêm vào giỏ <i class="ic_cart"></i></button>
                <button type="button" class="btn-cart btn-buy-now hide" data-id="{$detail.articlelist_id}">Mua nhanh</button>
              </div>
            </div> -->
          </form>
        </div>
      </div>
      <div class="product-detail-flex">
        <div class="artseed-detail product-detail-des" itemprop="articleBody">
          <div class="artseed-detail__ttl">Chi tiết sản phẩm</div>
          {if $toc|@count > 0}
          <div class="detail-toc">
            <div class="detail-toc__ttl">Mục lục bài viết</div>
            <ul class="toc-content">
              {foreach from=$toc item=item}
              <li style="margin-left:{math equation=" (x - 2) * 20" x=$item.level}px;">
                <a href="#{$item.id}" class="hover">
                  {$item.title}
                </a>
              </li>
              {/foreach}
            </ul>
          </div>
          {/if}
          {$content}
          {include file='tag.tpl'}
        </div>
        <div class="product-detail-sidebar">
          <div class="artseed-detail__ttl">Thông số kỹ thuật</div>
          {$detail.short}
        </div>
      </div>
    </div>


    {if $articles_related|@count > 0}
    <div class="related-articles">
      <h2 class="ttl02">Sản phẩm liên quan</h2>
      <div class="p-products">
        {include file='products/other.tpl'}
      </div>
    </div>
    {/if}


    <!-- /.artseed-ftn-body -->
  </div>
</main>