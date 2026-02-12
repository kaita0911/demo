<main>
   <div class="container">
      <div class="wrap-top">
         <div class="p-mv js-mv">
            {foreach from=$view_banner item=item}
            <div class="item">
               <img class="img" src="{$item.img_thumb_vn}" title="{$item.id}" alt="{$item.id}" fetchpriority="high">
            </div>
            {/foreach}
         </div>
         <div class="col-bnr">
            {foreach from=$view_partner item=item}
            <div class="item">
               <img src="{$item.img_thumb_vn}" title="{$item.id}" alt="{$item.id}" fetchpriority="high">
            </div>
            {/foreach}
         </div>
      </div>
   </div>
   <div class="p-product">
      <div class="container">
         <h2 class="ttl02 --sale">FLASH SALE - GIÁ SỐC MỖI NGÀY
         </h2>
         <div class="p-product-sale">
            <div class="js-sale">
               {foreach from=$product_new item=item}
               <div class="product-item">
                  <a class="product-item__img hover-img" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
                     <img src="{$item.img_thumb_vn}" alt="{$item.name_detail}" class="img-cover" loading="lazy">
                  </a>
                  <h3><a class="product-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">{$item.name_detail}</a></h3>
                  <div class="product-price">
                     <span class="price-current">{$item.price_formatted}</span>
                     {if $item.priceold > 0 }
                     <span class="price-old">{$item.priceold_formatted}</span>
                     {/if}
                  </div>
                  {if $quickview.open eq 1}
                     <div class="product-item__action">
                        <div data-tooltip="Thêm vào giỏ hàng" class="product-item__action__btn btn-add-cart"
                              data-id="{$item.id}"
                              data-name="{$item.name_detail}"
                              data-price="{$item.price|default:0}"
                              data-img="{$item.img_thumb_vn}">
                              <i class="fa-solid fa-cart-arrow-down"></i>
                        </div>
                        <div data-tooltip="Xem nhanh" class="product-item__action__btn btn-quickview" data-id="{$item.id}">
                           <i class="fa-regular fa-eye"></i>
                        </div>
                        <div data-tooltip="Thêm vào yêu thích" class="product-item__action__btn btn-wishlist {if in_array($item.id, $wishlist_ids)}active{/if}"
                           data-id="{$item.id}">
                           <i class="fa-regular fa-heart"></i>
                        </div>
                     </div>
                  {/if}
               </div>
               {/foreach}
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      {foreach from=$home_categories item=cat}
      <section class="home-category">
         <div class="home-category__head">
            <h2>
               <a class="ttl02" href="/{$cat.unique_key}/">
                  {$cat.name}
               </a>
            </h2>
            <div class="cate-sub">
               {if $cat.sub_categories}
               <ul>
                  {foreach from=$cat.sub_categories item=sub}
                  <li>
                     <a href="/{$sub.unique_key}">
                        {$sub.name}
                     </a>
                  </li>
                  {/foreach}
               </ul>
               {/if}
               <a class="view-all" href="/{$cat.unique_key}/">Xem thêm</a>
            </div>
         </div>
         <div class="p-products">
            {foreach from=$cat.products item=item}
            <div class="product-item">
               <a class="product-item__img hover-img" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
                  <img src="{$item.img_thumb_vn}" alt="{$item.name_detail}" class="img-cover" loading="lazy">
               </a>
               <h3><a class="product-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">{$item.name_detail}</a></h3>
               <div class="product-price">
                  <span class="price-current">{$item.price_formatted}</span>
                  {if $item.priceold_formatted}
                  <span class="price-old">{$item.priceold_formatted}</span>
                  {/if}
               </div>
               {if $quickview.open eq 1}
                     <div class="product-item__action">
                        <div data-tooltip="Thêm vào giỏ hàng" class="product-item__action__btn btn-add-cart"
                              data-id="{$item.id}"
                              data-name="{$item.name_detail}"
                              data-price="{$item.price|default:0}"
                              data-img="{$item.img_thumb_vn}">
                              <i class="fa-solid fa-cart-arrow-down"></i>
                        </div>
                        <div data-tooltip="Xem nhanh" class="product-item__action__btn btn-quickview" data-id="{$item.id}">
                           <i class="fa-regular fa-eye"></i>
                        </div>
                        <div data-tooltip="Thêm vào yêu thích" class="product-item__action__btn btn-wishlist {if in_array($item.id, $wishlist_ids)}active{/if}"
                           data-id="{$item.id}">
                           <i class="fa-regular fa-heart"></i>
                        </div>
                     </div>
                  {/if}
            </div>
            {/foreach}
         </div>
      </section>
      {/foreach}
   </div>


   <!-- <div class="p-feedback">
      <div class="container">
         <h2 class="ttl02">Phản hồi khách hàng</h2>
         <div class="js-feedback">
            {foreach from=$feedback item=item}
            <div class="feedback-item">
               <div class="feedback-item__img">
                  <img src="{$item.img_thumb_vn}?width=400&height=300&mode=cover" alt="{$item.name_detail}" class="img-cover" loading="lazy">
               </div>
               <div class="feedback-item__meta">
                  <div class="feedback-item__short">{$item.short}</div>
                  <h3 class="feedback-item__ttl">-- <span>{$item.name_detail}</span> --</h3>

               </div>
            </div>
            {/foreach}
         </div>
      </div>
   </div> -->
   <!-- <div class="p-news">
      <div class="container">
         <h2 class="ttl02">Tin tức</h2>
         <div class="p-news-wrap js-news">
            {foreach from=$news_home item=item}
            <div class="news-item">
               <a class="news-item__img hover-img" href="{$path_url}/{$lang_prefix}{$item.unique_key}" title="{$item.name_detail}">
                  <img src="{$item.img_thumb_vn}?width=800&height=600&mode=cover" alt="{$item.name_detail}" class="img-cover" loading="lazy">
               </a>
               <h3><a class="news-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}" title="{$item.name_detail}">{$item.name_detail}</a></h3>
               <div class="news-item__short">{$item.short}</div>
            </div>
            {/foreach}
         </div>
      </div>
   </div> -->
   <!-- <div class="p-partner">
      <div class="container">
         <div class="js-partner">
            {foreach from=$view_partner item=item}
            <div class="item hover-img">
               <img src="{$path_url}/{$item.img_thumb_vn}" alt="{$item.id}" class="img-scale" loading="lazy">
            </div>
            {/foreach}
         </div>
      </div>
   </div> -->
</main>
{include file='popup.tpl'}