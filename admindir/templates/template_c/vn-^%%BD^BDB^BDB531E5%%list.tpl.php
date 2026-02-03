<?php /* Smarty version 2.6.30, created on 2026-02-03 11:11:30
         compiled from register_info/list.tpl */ ?>
<div class="contentmain">
   <div class="main">

      <aside class="left_sidebar padding10">
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </aside>

      <section class="right_content conten">
         <div class="divright">
            <div class="acti2">
               <button class="add" type="button" id="btnDelete" data-comp="">
                  <i class="fa fa-trash"></i> Xóa
               </button>
            </div>
         </div>
         <div class="main-content">
            <form class="form-all" method="post" action="">
               <table class="br1 w-full border-collapse">
                  <thead>
                     <tr>
                        <th align="center" class="width-del">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th class="width-del">STT</th>

                        <th class="width-ttl">Tiêu đề</th>
                        <th class="width-date">Ngày tháng</th>
                        <th class="width-action">Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php $_from = $this->_tpl_vars['articlelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['loop']['iteration']++;
?>
                     <tr data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" class="<?php if ($this->_tpl_vars['item']['is_read'] == 0): ?>unread<?php endif; ?>">

                        <td class="text-center">
                           <input type="checkbox" class="c-item" name="cid[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
                        </td>

                        <td class=" text-center">
                           <?php echo $this->_foreach['loop']['iteration']; ?>

                        </td>



                        <td class=" text-left linkblack">
                           <?php echo $this->_tpl_vars['item']['fullname']; ?>

                        </td>
                        <td align="center" class=" text-center linkblack">
                           <?php echo $this->_tpl_vars['item']['created_at']; ?>

                        </td>
                        <td align="center">

                           <a href="index.php?do=register_info&act=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">Xem</a>

                        </td>
                     </tr>
                     <?php endforeach; endif; unset($_from); ?>
                  </tbody>
               </table>
            </form>
         </div>
      </section>
   </div>
</div>