<main>
   <div class="container">
      <ul class="breadcumb">{include file='breadcumb.tpl'}</ul>
      <div class="c-filter">
         <h1 class="ttl01"> {$c_ttl} </h1>
         {if $filter_product.open eq 1}
         <div class="sort-wrapper">
            <select id="sort-product">
               <option value="">Sắp xếp</option>
               <option value="name_asc">Tên A - Z</option>
               <option value="name_desc">Tên Z - A</option>
               <option value="price_asc">Giá thấp - cao</option>
               <option value="price_desc">Giá cao - thấp</option>
            </select>
         </div>
         {/if}
      </div>
      {if $cateInfo.content}
      <div class="cate-description">{$cateInfo.content}</div>
      {/if}
      {if $view|@count > 0}
      <div id="product-list">
         {include file='products/list.tpl'}
      </div>
      {else}
      <div class="no-product">
         <p>Không có sản phẩm nào trong danh mục này.</p>
      </div>
      {/if}
   </div>
</main>