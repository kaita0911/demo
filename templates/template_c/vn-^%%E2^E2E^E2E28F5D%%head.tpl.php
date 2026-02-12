<?php /* Smarty version 2.6.30, created on 2026-02-12 11:11:49
         compiled from ./head.tpl */ ?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta name="robots" content="INDEX, FOLLOW, NOODP">
  <meta name="Author" content="<?php echo $this->_tpl_vars['domain']['domain']; ?>
" />
  <link rel="shortcut icon" href="<?php echo $this->_tpl_vars['path_url']; ?>
/favicon.ico" type="image/x-icon">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $this->_tpl_vars['path_url']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
">  
  <meta property="og:site_name" content="<?php echo $this->_tpl_vars['domain']['domain']; ?>
">
  <link rel="canonical" href="<?php echo $this->_tpl_vars['path_url']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
" />
  <link rel="alternate" href="<?php echo $this->_tpl_vars['path_url']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
" hreflang="vi-vn" />
  <link rel="alternate" href="<?php echo $this->_tpl_vars['path_url']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
" hreflang="x-default" />
  <?php if ($this->_tpl_vars['is_home'] == 1): ?>
  <title><?php echo $this->_tpl_vars['seo']['name_vn']; ?>
</title>
  <meta name="keywords" content="<?php echo $this->_tpl_vars['seo']['keyword']; ?>
">
  <meta name="description" content="<?php echo $this->_tpl_vars['seo']['desc']; ?>
">
  <meta property="og:title" content="<?php if ($this->_tpl_vars['is_page'] == 1): ?><?php echo $this->_tpl_vars['c_ttl']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seo']['name_vn']; ?>
<?php endif; ?>">
  <meta property="og:description" content="<?php echo $this->_tpl_vars['seo']['desc']; ?>
">
  <meta property="og:image" content="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/OGP.jpg">
  <?php else: ?>
  <title><?php if ($this->_tpl_vars['seo']['name']): ?><?php echo $this->_tpl_vars['seo']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['c_ttl']; ?>
<?php endif; ?></title>
  <meta name="keywords" content="<?php echo $this->_tpl_vars['seo']['keyword']; ?>
">
  <meta name="description" content="<?php if ($this->_tpl_vars['seo']['des']): ?><?php echo $this->_tpl_vars['seo']['des']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seo']['desc']; ?>
<?php endif; ?>">
  <meta property="og:title" content="<?php if ($this->_tpl_vars['seo']['name']): ?><?php echo $this->_tpl_vars['seo']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['c_ttl']; ?>
<?php endif; ?>">
  <meta property="og:description" content="<?php if ($this->_tpl_vars['seo']['des']): ?><?php echo $this->_tpl_vars['seo']['des']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seo']['desc']; ?>
<?php endif; ?>">
  <?php if ($this->_tpl_vars['seo']['img_vn']): ?>
  <meta property="og:image" content="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['seo']['img_vn']; ?>
">
  <link rel="image_src" type="image/jpeg" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['seo']['img_vn']; ?>
"/>
  <?php elseif ($this->_tpl_vars['seo']['img_thumb_vn']): ?>
  <meta property="og:image" content="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['seo']['img_thumb_vn']; ?>
">
  <link rel="image_src" type="image/jpeg" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['seo']['img_thumb_vn']; ?>
"/>
  <?php else: ?>
  <meta property="og:image" content="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/OGP.jpg">
  <?php endif; ?>
  <?php endif; ?>
  <meta name="twitter:card" content="summary_large_image">
  <!-- Fancybox CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css"> -->

  <?php echo '
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "'; ?>
<?php echo $this->_tpl_vars['c_ttl']; ?>
<?php echo '",
      "url": "'; ?>
<?php echo $this->_tpl_vars['path_url']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
<?php echo '",
      "description": "'; ?>
<?php echo $this->_tpl_vars['seo']['des']; ?>
<?php echo '"
    }
  </script> 
  '; ?>

  <?php echo $this->_tpl_vars['headerscript']['content_vn']; ?>

</head>