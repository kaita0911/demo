
<main class="p-wishlist">
   <div class="container">
      <div class="c-filter">
         <h1 class="ttl01">Danh sách yêu thích</h1>
      </div>
      
      {if $wishlist|@count > 0}
      <div class="p-products">
      {foreach from=$wishlist item=item}
      <div class="product-item">
            <a href="{$path_url}/{$lang_prefix}{$item.unique_key}.html">
            <img src="/{$item.img_thumb_vn}" alt="{$item.name}" loading="lazy">
            </a>

            <h3>{$item.name}</h3>

            <div class="product-price">
            <span class="price-current">{$item.price_formatted}</span>
            {if $item.priceold > 0}
               <span class="price-old">{$item.priceold_formatted}</span>
            {/if}
            </div>
            <div class="product-item-action">
            <div class="btn-wishlist
               {if in_array($item.id, $wishlist_ids)}active{/if}"
               data-id="{$item.id}"
               title="Thêm vào yêu thích">
               <i class="fa-regular fa-heart"></i>
            </div>
            </div>
            
         </div>
      {/foreach}
      </div>
      {else}
      <p>Chưa có sản phẩm nào trong wishlist ❤️</p>
      {/if}
   </div>
   <br>
</main>
