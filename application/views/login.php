<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IQJ NOMINA | LOGIN</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css'); ?> " rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
        @import url("https://fonts.googleapis.com/css?family=Roboto:400,300,500,700");
        /*  
         *  
         *   INSPINIA - Responsive Admin Theme
         *   version 2.6.2
         *
        */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
          font-weight: 100;
        }
        h1 {
          font-size: 30px;
        }
        h2 {
          font-size: 24px;
        }
        h3 {
          font-size: 16px;
        }
        h4 {
          font-size: 14px;
        }
        h5 {
          font-size: 12px;
        }
        h6 {
          font-size: 10px;
        }
        h3,
        h4,
        h5 {
          margin-top: 5px;
          font-weight: 600;
        }
        .nav > li > a {
          color: #a7b1c2;
          font-weight: 600;
          padding: 14px 20px 14px 25px;
        }
        .nav.navbar-right > li > a {
          color: #999c9e;
        }
        .nav > li.active > a {
          color: #ffffff;
        }
        .navbar-default .nav > li > a:hover,
        .navbar-default .nav > li > a:focus {
          background-color: #293846;
          color: white;
        }
        .nav .open > a,
        .nav .open > a:hover,
        .nav .open > a:focus {
          background: #fff;
        }
        .nav.navbar-top-links > li > a:hover,
        .nav.navbar-top-links > li > a:focus {
          background-color: transparent;
        }
        .nav > li > a i {
          margin-right: 6px;
        }
        .navbar {
          border: 0;
        }
        .navbar-default {
          background-color: transparent;
          border-color: #2f4050;
        }
        .navbar-top-links li {
          display: inline-block;
        }
        .navbar-top-links li:last-child {
          margin-right: 40px;
        }
        .body-small .navbar-top-links li:last-child {
          margin-right: 0;
        }
        .navbar-top-links li a {
          padding: 20px 10px;
          min-height: 50px;
        }
        .dropdown-menu {
          border: medium none;
          border-radius: 3px;
          box-shadow: 0 0 3px rgba(86, 96, 117, 0.7);
          display: none;
          float: left;
          font-size: 12px;
          left: 0;
          list-style: none outside none;
          padding: 0;
          position: absolute;
          text-shadow: none;
          top: 100%;
          z-index: 1000;
        }
        .dropdown-menu > li > a {
          border-radius: 3px;
          color: inherit;
          line-height: 25px;
          margin: 4px;
          text-align: left;
          font-weight: normal;
        }
        .dropdown-menu > .active > a,
        .dropdown-menu > .active > a:focus,
        .dropdown-menu > .active > a:hover {
          color: #fff;
          text-decoration: none;
          background-color: #1ab394;
          outline: 0;
        }
        .dropdown-menu > li > a.font-bold {
          font-weight: 600;
        }
        .navbar-top-links .dropdown-menu li {
          display: block;
        }
        .navbar-top-links .dropdown-menu li:last-child {
          margin-right: 0;
        }
        .navbar-top-links .dropdown-menu li a {
          padding: 3px 20px;
          min-height: 0;
        }
        .navbar-top-links .dropdown-menu li a div {
          white-space: normal;
        }
        .navbar-top-links .dropdown-messages,
        .navbar-top-links .dropdown-tasks,
        .navbar-top-links .dropdown-alerts {
          width: 310px;
          min-width: 0;
        }
        .navbar-top-links .dropdown-messages {
          margin-left: 5px;
        }
        .navbar-top-links .dropdown-tasks {
          margin-left: -59px;
        }
        .navbar-top-links .dropdown-alerts {
          margin-left: -123px;
        }
        .navbar-top-links .dropdown-user {
          right: 0;
          left: auto;
        }
        .dropdown-messages,
        .dropdown-alerts {
          padding: 10px 10px 10px 10px;
        }
        .dropdown-messages li a,
        .dropdown-alerts li a {
          font-size: 12px;
        }
        .dropdown-messages li em,
        .dropdown-alerts li em {
          font-size: 10px;
        }
        .nav.navbar-top-links .dropdown-alerts a {
          font-size: 12px;
        }
        .nav-header {
          padding: 33px 25px;
          background-color: #2f4050;
          background-image: url("patterns/header-profile.png");
        }
        .pace-done .nav-header {
          transition: all 0.4s;
        }
        .nav > li.active {
          border-left: 4px solid #19aa8d;
          background: #293846;
        }
        .nav.nav-second-level > li.active {
          border: none;
        }
        .nav.nav-second-level.collapse[style] {
          height: auto !important;
        }
        .nav-header a {
          color: #DFE4ED;
        }
        .nav-header .text-muted {
          color: #8095a8;
        }
        .minimalize-styl-2 {
          padding: 4px 12px;
          margin: 14px 5px 5px 20px;
          font-size: 14px;
          float: left;
        }
        .navbar-form-custom {
          float: left;
          height: 50px;
          padding: 0;
          width: 200px;
          display: block;
        }
        .navbar-form-custom .form-group {
          margin-bottom: 0;
        }
        .nav.navbar-top-links a {
          font-size: 14px;
        }
        .navbar-form-custom .form-control {
          background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
          border: medium none;
          font-size: 14px;
          height: 60px;
          margin: 0;
          z-index: 2000;
        }
        .count-info .label {
          line-height: 12px;
          padding: 2px 5px;
          position: absolute;
          right: 6px;
          top: 12px;
        }
        .arrow {
          float: right;
        }
        .fa.arrow:before {
          content: "\f104";
        }
        .active > a > .fa.arrow:before {
          content: "\f107";
        }
        .nav-second-level li,
        .nav-third-level li {
          border-bottom: none !important;
        }
        .nav-second-level li a {
          padding: 7px 10px 7px 10px;
          padding-left: 52px;
        }
        .nav-third-level li a {
          padding-left: 62px;
        }
        .nav-second-level li:last-child {
          margin-bottom: 10px;
        }
        body:not(.fixed-sidebar):not(.canvas-menu).mini-navbar .nav li:hover > .nav-second-level,
        .mini-navbar .nav li:focus > .nav-second-level {
          display: block;
          border-radius: 0 2px 2px 0;
          min-width: 140px;
          height: auto;
        }
        body.mini-navbar .navbar-default .nav > li > .nav-second-level li a {
          font-size: 12px;
          border-radius: 3px;
        }
        .fixed-nav .slimScrollDiv #side-menu {
          padding-bottom: 60px;
        }
        .mini-navbar .nav-second-level li a {
          padding: 10px 10px 10px 15px;
        }
        .mini-navbar .nav .nav-second-level {
          position: absolute;
          left: 70px;
          top: 0;
          background-color: #2f4050;
          padding: 10px 10px 10px 10px;
          font-size: 12px;
        }
        .canvas-menu.mini-navbar .nav-second-level {
          background: #293846;
        }
        .mini-navbar li.active .nav-second-level {
          left: 65px;
        }
        .navbar-default .special_link a {
          background: #1ab394;
          color: white;
        }
        .navbar-default .special_link a:hover {
          background: #17987e !important;
          color: white;
        }
        .navbar-default .special_link a span.label {
          background: #fff;
          color: #1ab394;
        }
        .navbar-default .landing_link a {
          background: #1cc09f;
          color: white;
        }
        .navbar-default .landing_link a:hover {
          background: #1ab394 !important;
          color: white;
        }
        .navbar-default .landing_link a span.label {
          background: #fff;
          color: #1cc09f;
        }
        .logo-element {
          text-align: center;
          font-size: 18px;
          font-weight: 600;
          color: white;
          display: none;
          padding: 18px 0;
        }
        .pace-done .navbar-static-side,
        .pace-done .nav-header,
        .pace-done li.active,
        .pace-done #page-wrapper,
        .pace-done .footer {
          -webkit-transition: all 0.4s;
          -moz-transition: all 0.4s;
          -o-transition: all 0.4s;
          transition: all 0.4s;
        }
        .navbar-fixed-top {
          background: #fff;
          transition-duration: 0.4s;
          border-bottom: 1px solid #e7eaec !important;
          z-index: 2030;
        }
        .navbar-fixed-top,
        .navbar-static-top {
          background: #f3f3f4;
        }
        .fixed-nav #wrapper {
          margin-top: 0;
        }
        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
          -moz-border-bottom-colors: none;
          -moz-border-left-colors: none;
          -moz-border-right-colors: none;
          -moz-border-top-colors: none;
          background: none;
          border-color: #dddddd #dddddd rgba(0, 0, 0, 0);
          border-bottom: #f3f3f4;
          border-image: none;
          border-style: solid;
          border-width: 1px;
          color: #555555;
          cursor: default;
        }
        .nav.nav-tabs li {
          background: none;
          border: none;
        }
        body.fixed-nav #wrapper .navbar-static-side,
        body.fixed-nav #wrapper #page-wrapper {
          margin-top: 60px;
        }
        body.top-navigation.fixed-nav #wrapper #page-wrapper {
          margin-top: 0;
        }
        body.fixed-nav.fixed-nav-basic .navbar-fixed-top {
          left: 220px;
        }
        body.fixed-nav.fixed-nav-basic.mini-navbar .navbar-fixed-top {
          left: 70px;
        }
        body.fixed-nav.fixed-nav-basic.fixed-sidebar.mini-navbar .navbar-fixed-top {
          left: 0;
        }
        body.fixed-nav.fixed-nav-basic #wrapper .navbar-static-side {
          margin-top: 0;
        }
        body.fixed-nav.fixed-nav-basic.body-small .navbar-fixed-top {
          left: 0;
        }
        body.fixed-nav.fixed-nav-basic.fixed-sidebar.mini-navbar.body-small .navbar-fixed-top {
          left: 220px;
        }
        .fixed-nav .minimalize-styl-2 {
          margin: 14px 5px 5px 15px;
        }
        .body-small .navbar-fixed-top {
          margin-left: 0;
        }
        body.mini-navbar .navbar-static-side {
          width: 70px;
        }
        body.mini-navbar .profile-element,
        body.mini-navbar .nav-label,
        body.mini-navbar .navbar-default .nav li a span {
          display: none;
        }
        body.canvas-menu .profile-element {
          display: block;
        }
        body:not(.fixed-sidebar):not(.canvas-menu).mini-navbar .nav-second-level {
          display: none;
        }
        body.mini-navbar .navbar-default .nav > li > a {
          font-size: 16px;
        }
        body.mini-navbar .logo-element {
          display: block;
        }
        body.canvas-menu .logo-element {
          display: none;
        }
        body.mini-navbar .nav-header {
          padding: 0;
          background-color: #1ab394;
        }
        body.canvas-menu .nav-header {
          padding: 33px 25px;
        }
        body.mini-navbar #page-wrapper {
          margin: 0 0 0 70px;
        }
        body.fixed-sidebar.mini-navbar .footer,
        body.canvas-menu.mini-navbar .footer {
          margin: 0 0 0 0 !important;
        }
        body.canvas-menu.mini-navbar #page-wrapper,
        body.canvas-menu.mini-navbar .footer {
          margin: 0 0 0 0;
        }
        body.fixed-sidebar .navbar-static-side,
        body.canvas-menu .navbar-static-side {
          position: fixed;
          width: 220px;
          z-index: 2001;
          height: 100%;
        }
        body.fixed-sidebar.mini-navbar .navbar-static-side {
          width: 0;
        }
        body.fixed-sidebar.mini-navbar #page-wrapper {
          margin: 0 0 0 0;
        }
        body.body-small.fixed-sidebar.mini-navbar #page-wrapper {
          margin: 0 0 0 220px;
        }
        body.body-small.fixed-sidebar.mini-navbar .navbar-static-side {
          width: 220px;
        }
        .fixed-sidebar.mini-navbar .nav li:focus > .nav-second-level,
        .canvas-menu.mini-navbar .nav li:focus > .nav-second-level {
          display: block;
          height: auto;
        }
        body.fixed-sidebar.mini-navbar .navbar-default .nav > li > .nav-second-level li a {
          font-size: 12px;
          border-radius: 3px;
        }
        body.canvas-menu.mini-navbar .navbar-default .nav > li > .nav-second-level li a {
          font-size: 13px;
          border-radius: 3px;
        }
        .fixed-sidebar.mini-navbar .nav-second-level li a,
        .canvas-menu.mini-navbar .nav-second-level li a {
          padding: 10px 10px 10px 15px;
        }
        .fixed-sidebar.mini-navbar .nav-second-level,
        .canvas-menu.mini-navbar .nav-second-level {
          position: relative;
          padding: 0;
          font-size: 13px;
        }
        .fixed-sidebar.mini-navbar li.active .nav-second-level,
        .canvas-menu.mini-navbar li.active .nav-second-level {
          left: 0;
        }
        body.fixed-sidebar.mini-navbar .navbar-default .nav > li > a,
        body.canvas-menu.mini-navbar .navbar-default .nav > li > a {
          font-size: 13px;
        }
        body.fixed-sidebar.mini-navbar .nav-label,
        body.fixed-sidebar.mini-navbar .navbar-default .nav li a span,
        body.canvas-menu.mini-navbar .nav-label,
        body.canvas-menu.mini-navbar .navbar-default .nav li a span {
          display: inline;
        }
        body.canvas-menu.mini-navbar .navbar-default .nav li .profile-element a span {
          display: block;
        }
        .canvas-menu.mini-navbar .nav-second-level li a,
        .fixed-sidebar.mini-navbar .nav-second-level li a {
          padding: 7px 10px 7px 52px;
        }
        .fixed-sidebar.mini-navbar .nav-second-level,
        .canvas-menu.mini-navbar .nav-second-level {
          left: 0;
        }
        body.canvas-menu nav.navbar-static-side {
          z-index: 2001;
          background: #2f4050;
          height: 100%;
          position: fixed;
          display: none;
        }
        body.canvas-menu.mini-navbar nav.navbar-static-side {
          display: block;
          width: 520px;
        }
        .top-navigation #page-wrapper {
          margin-left: 0;
        }
        .top-navigation .navbar-nav .dropdown-menu > .active > a {
          background: white;
          color: #1ab394;
          font-weight: bold;
        }
        .white-bg .navbar-fixed-top,
        .white-bg .navbar-static-top {
          background: #fff;
        }
        .top-navigation .navbar {
          margin-bottom: 0;
        }
        .top-navigation .nav > li > a {
          padding: 15px 20px;
          color: #676a6c;
        }
        .top-navigation .nav > li a:hover,
        .top-navigation .nav > li a:focus {
          background: #fff;
          color: #1ab394;
        }
        .top-navigation .nav > li.active {
          background: #fff;
          border: none;
        }
        .top-navigation .nav > li.active > a {
          color: #1ab394;
        }
        .top-navigation .navbar-right {
          margin-right: 10px;
        }
        .top-navigation .navbar-nav .dropdown-menu {
          box-shadow: none;
          border: 1px solid #e7eaec;
        }
        .top-navigation .dropdown-menu > li > a {
          margin: 0;
          padding: 7px 20px;
        }
        .navbar .dropdown-menu {
          margin-top: 0;
        }
        .top-navigation .navbar-brand {
          background: #1ab394;
          color: #fff;
          padding: 15px 25px;
        }
        .top-navigation .navbar-top-links li:last-child {
          margin-right: 0;
        }
        .top-navigation.mini-navbar #page-wrapper,
        .top-navigation.body-small.fixed-sidebar.mini-navbar #page-wrapper,
        .mini-navbar .top-navigation #page-wrapper,
        .body-small.fixed-sidebar.mini-navbar .top-navigation #page-wrapper,
        .canvas-menu #page-wrapper {
          margin: 0;
        }
        .top-navigation.fixed-nav #wrapper,
        .fixed-nav #wrapper.top-navigation {
          margin-top: 50px;
        }
        .top-navigation .footer.fixed {
          margin-left: 0 !important;
        }
        .top-navigation .wrapper.wrapper-content {
          padding: 40px;
        }
        .top-navigation.body-small .wrapper.wrapper-content,
        .body-small .top-navigation .wrapper.wrapper-content {
          padding: 40px 0 40px 0;
        }
        .navbar-toggle {
          background-color: #1ab394;
          color: #fff;
          padding: 6px 12px;
          font-size: 14px;
        }
        .top-navigation .navbar-nav .open .dropdown-menu > li > a,
        .top-navigation .navbar-nav .open .dropdown-menu .dropdown-header {
          padding: 10px 15px 10px 20px;
        }
        @media (max-width: 768px) {
          .top-navigation .navbar-header {
            display: block;
            float: none;
          }
        }
        .menu-visible-lg,
        .menu-visible-md {
          display: none !important;
        }
        @media (min-width: 1200px) {
          .menu-visible-lg {
            display: block !important;
          }
        }
        @media (min-width: 992px) {
          .menu-visible-md {
            display: block !important;
          }
        }
        @media (max-width: 767px) {
          .menu-visible-md {
            display: block !important;
          }
          .menu-visible-lg {
            display: block !important;
          }
        }
        .btn {
          border-radius: 3px;
        }
        .float-e-margins .btn {
          margin-bottom: 5px;
        }
        .btn-w-m {
          min-width: 120px;
        }
        .btn-primary.btn-outline {
          color: #1ab394;
        }
        .btn-success.btn-outline {
          color: #1c84c6;
        }
        .btn-info.btn-outline {
          color: #23c6c8;
        }
        .btn-warning.btn-outline {
          color: #f8ac59;
        }
        .btn-danger.btn-outline {
          color: #ed5565;
        }
        .btn-primary.btn-outline:hover,
        .btn-success.btn-outline:hover,
        .btn-info.btn-outline:hover,
        .btn-warning.btn-outline:hover,
        .btn-danger.btn-outline:hover {
          color: #fff;
        }
        .btn-primary {
          background-color: #1ab394;
          border-color: #1ab394;
          color: #FFFFFF;
        }
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open .dropdown-toggle.btn-primary,
        .btn-primary:active:focus,
        .btn-primary:active:hover,
        .btn-primary.active:hover,
        .btn-primary.active:focus {
          background-color: #18a689;
          border-color: #18a689;
          color: #FFFFFF;
        }
        .btn-primary:active,
        .btn-primary.active,
        .open .dropdown-toggle.btn-primary {
          background-image: none;
        }
        .btn-primary.disabled,
        .btn-primary.disabled:hover,
        .btn-primary.disabled:focus,
        .btn-primary.disabled:active,
        .btn-primary.disabled.active,
        .btn-primary[disabled],
        .btn-primary[disabled]:hover,
        .btn-primary[disabled]:focus,
        .btn-primary[disabled]:active,
        .btn-primary.active[disabled],
        fieldset[disabled] .btn-primary,
        fieldset[disabled] .btn-primary:hover,
        fieldset[disabled] .btn-primary:focus,
        fieldset[disabled] .btn-primary:active,
        fieldset[disabled] .btn-primary.active {
          background-color: #1dc5a3;
          border-color: #1dc5a3;
        }
        .btn-success {
          background-color: #1c84c6;
          border-color: #1c84c6;
          color: #FFFFFF;
        }
        .btn-success:hover,
        .btn-success:focus,
        .btn-success:active,
        .btn-success.active,
        .open .dropdown-toggle.btn-success,
        .btn-success:active:focus,
        .btn-success:active:hover,
        .btn-success.active:hover,
        .btn-success.active:focus {
          background-color: #1a7bb9;
          border-color: #1a7bb9;
          color: #FFFFFF;
        }
        .btn-success:active,
        .btn-success.active,
        .open .dropdown-toggle.btn-success {
          background-image: none;
        }
        .btn-success.disabled,
        .btn-success.disabled:hover,
        .btn-success.disabled:focus,
        .btn-success.disabled:active,
        .btn-success.disabled.active,
        .btn-success[disabled],
        .btn-success[disabled]:hover,
        .btn-success[disabled]:focus,
        .btn-success[disabled]:active,
        .btn-success.active[disabled],
        fieldset[disabled] .btn-success,
        fieldset[disabled] .btn-success:hover,
        fieldset[disabled] .btn-success:focus,
        fieldset[disabled] .btn-success:active,
        fieldset[disabled] .btn-success.active {
          background-color: #1f90d8;
          border-color: #1f90d8;
        }
        .btn-info {
          background-color: #23c6c8;
          border-color: #23c6c8;
          color: #FFFFFF;
        }
        .btn-info:hover,
        .btn-info:focus,
        .btn-info:active,
        .btn-info.active,
        .open .dropdown-toggle.btn-info,
        .btn-info:active:focus,
        .btn-info:active:hover,
        .btn-info.active:hover,
        .btn-info.active:focus {
          background-color: #21b9bb;
          border-color: #21b9bb;
          color: #FFFFFF;
        }
        .btn-info:active,
        .btn-info.active,
        .open .dropdown-toggle.btn-info {
          background-image: none;
        }
        .btn-info.disabled,
        .btn-info.disabled:hover,
        .btn-info.disabled:focus,
        .btn-info.disabled:active,
        .btn-info.disabled.active,
        .btn-info[disabled],
        .btn-info[disabled]:hover,
        .btn-info[disabled]:focus,
        .btn-info[disabled]:active,
        .btn-info.active[disabled],
        fieldset[disabled] .btn-info,
        fieldset[disabled] .btn-info:hover,
        fieldset[disabled] .btn-info:focus,
        fieldset[disabled] .btn-info:active,
        fieldset[disabled] .btn-info.active {
          background-color: #26d7d9;
          border-color: #26d7d9;
        }
        .btn-default {
          color: inherit;
          background: white;
          border: 1px solid #e7eaec;
        }
        .btn-default:hover,
        .btn-default:focus,
        .btn-default:active,
        .btn-default.active,
        .open .dropdown-toggle.btn-default,
        .btn-default:active:focus,
        .btn-default:active:hover,
        .btn-default.active:hover,
        .btn-default.active:focus {
          color: inherit;
          border: 1px solid #d2d2d2;
        }
        .btn-default:active,
        .btn-default.active,
        .open .dropdown-toggle.btn-default {
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15) inset;
        }
        .btn-default.disabled,
        .btn-default.disabled:hover,
        .btn-default.disabled:focus,
        .btn-default.disabled:active,
        .btn-default.disabled.active,
        .btn-default[disabled],
        .btn-default[disabled]:hover,
        .btn-default[disabled]:focus,
        .btn-default[disabled]:active,
        .btn-default.active[disabled],
        fieldset[disabled] .btn-default,
        fieldset[disabled] .btn-default:hover,
        fieldset[disabled] .btn-default:focus,
        fieldset[disabled] .btn-default:active,
        fieldset[disabled] .btn-default.active {
          color: #cacaca;
        }
        .btn-warning {
          background-color: #f8ac59;
          border-color: #f8ac59;
          color: #FFFFFF;
        }
        .btn-warning:hover,
        .btn-warning:focus,
        .btn-warning:active,
        .btn-warning.active,
        .open .dropdown-toggle.btn-warning,
        .btn-warning:active:focus,
        .btn-warning:active:hover,
        .btn-warning.active:hover,
        .btn-warning.active:focus {
          background-color: #f7a54a;
          border-color: #f7a54a;
          color: #FFFFFF;
        }
        .btn-warning:active,
        .btn-warning.active,
        .open .dropdown-toggle.btn-warning {
          background-image: none;
        }
        .btn-warning.disabled,
        .btn-warning.disabled:hover,
        .btn-warning.disabled:focus,
        .btn-warning.disabled:active,
        .btn-warning.disabled.active,
        .btn-warning[disabled],
        .btn-warning[disabled]:hover,
        .btn-warning[disabled]:focus,
        .btn-warning[disabled]:active,
        .btn-warning.active[disabled],
        fieldset[disabled] .btn-warning,
        fieldset[disabled] .btn-warning:hover,
        fieldset[disabled] .btn-warning:focus,
        fieldset[disabled] .btn-warning:active,
        fieldset[disabled] .btn-warning.active {
          background-color: #f9b66d;
          border-color: #f9b66d;
        }
        .btn-danger {
          background-color: #ed5565;
          border-color: #ed5565;
          color: #FFFFFF;
        }
        .btn-danger:hover,
        .btn-danger:focus,
        .btn-danger:active,
        .btn-danger.active,
        .open .dropdown-toggle.btn-danger,
        .btn-danger:active:focus,
        .btn-danger:active:hover,
        .btn-danger.active:hover,
        .btn-danger.active:focus {
          background-color: #ec4758;
          border-color: #ec4758;
          color: #FFFFFF;
        }
        .btn-danger:active,
        .btn-danger.active,
        .open .dropdown-toggle.btn-danger {
          background-image: none;
        }
        .btn-danger.disabled,
        .btn-danger.disabled:hover,
        .btn-danger.disabled:focus,
        .btn-danger.disabled:active,
        .btn-danger.disabled.active,
        .btn-danger[disabled],
        .btn-danger[disabled]:hover,
        .btn-danger[disabled]:focus,
        .btn-danger[disabled]:active,
        .btn-danger.active[disabled],
        fieldset[disabled] .btn-danger,
        fieldset[disabled] .btn-danger:hover,
        fieldset[disabled] .btn-danger:focus,
        fieldset[disabled] .btn-danger:active,
        fieldset[disabled] .btn-danger.active {
          background-color: #ef6776;
          border-color: #ef6776;
        }
        .btn-link {
          color: inherit;
        }
        .btn-link:hover,
        .btn-link:focus,
        .btn-link:active,
        .btn-link.active,
        .open .dropdown-toggle.btn-link {
          color: #1ab394;
          text-decoration: none;
        }
        .btn-link:active,
        .btn-link.active,
        .open .dropdown-toggle.btn-link {
          background-image: none;
        }
        .btn-link.disabled,
        .btn-link.disabled:hover,
        .btn-link.disabled:focus,
        .btn-link.disabled:active,
        .btn-link.disabled.active,
        .btn-link[disabled],
        .btn-link[disabled]:hover,
        .btn-link[disabled]:focus,
        .btn-link[disabled]:active,
        .btn-link.active[disabled],
        fieldset[disabled] .btn-link,
        fieldset[disabled] .btn-link:hover,
        fieldset[disabled] .btn-link:focus,
        fieldset[disabled] .btn-link:active,
        fieldset[disabled] .btn-link.active {
          color: #cacaca;
        }
        .btn-white {
          color: inherit;
          background: white;
          border: 1px solid #e7eaec;
        }
        .btn-white:hover,
        .btn-white:focus,
        .btn-white:active,
        .btn-white.active,
        .open .dropdown-toggle.btn-white,
        .btn-white:active:focus,
        .btn-white:active:hover,
        .btn-white.active:hover,
        .btn-white.active:focus {
          color: inherit;
          border: 1px solid #d2d2d2;
        }
        .btn-white:active,
        .btn-white.active {
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15) inset;
        }
        .btn-white:active,
        .btn-white.active,
        .open .dropdown-toggle.btn-white {
          background-image: none;
        }
        .btn-white.disabled,
        .btn-white.disabled:hover,
        .btn-white.disabled:focus,
        .btn-white.disabled:active,
        .btn-white.disabled.active,
        .btn-white[disabled],
        .btn-white[disabled]:hover,
        .btn-white[disabled]:focus,
        .btn-white[disabled]:active,
        .btn-white.active[disabled],
        fieldset[disabled] .btn-white,
        fieldset[disabled] .btn-white:hover,
        fieldset[disabled] .btn-white:focus,
        fieldset[disabled] .btn-white:active,
        fieldset[disabled] .btn-white.active {
          color: #cacaca;
        }
        .form-control,
        .form-control:focus,
        .has-error .form-control:focus,
        .has-success .form-control:focus,
        .has-warning .form-control:focus,
        .navbar-collapse,
        .navbar-form,
        .navbar-form-custom .form-control:focus,
        .navbar-form-custom .form-control:hover,
        .open .btn.dropdown-toggle,
        .panel,
        .popover,
        .progress,
        .progress-bar {
          box-shadow: none;
        }
        .btn-outline {
          color: inherit;
          background-color: transparent;
          transition: all .5s;
        }
        .btn-rounded {
          border-radius: 50px;
        }
        .btn-large-dim {
          width: 90px;
          height: 90px;
          font-size: 42px;
        }
        button.dim {
          display: inline-block;
          text-decoration: none;
          text-transform: uppercase;
          text-align: center;
          padding-top: 6px;
          margin-right: 10px;
          position: relative;
          cursor: pointer;
          border-radius: 5px;
          font-weight: 600;
          margin-bottom: 20px !important;
        }
        button.dim:active {
          top: 3px;
        }
        button.btn-primary.dim {
          box-shadow: inset 0 0 0 #16987e, 0 5px 0 0 #16987e, 0 10px 5px #999999;
        }
        button.btn-primary.dim:active {
          box-shadow: inset 0 0 0 #16987e, 0 2px 0 0 #16987e, 0 5px 3px #999999;
        }
        button.btn-default.dim {
          box-shadow: inset 0 0 0 #b3b3b3, 0 5px 0 0 #b3b3b3, 0 10px 5px #999999;
        }
        button.btn-default.dim:active {
          box-shadow: inset 0 0 0 #b3b3b3, 0 2px 0 0 #b3b3b3, 0 5px 3px #999999;
        }
        button.btn-warning.dim {
          box-shadow: inset 0 0 0 #f79d3c, 0 5px 0 0 #f79d3c, 0 10px 5px #999999;
        }
        button.btn-warning.dim:active {
          box-shadow: inset 0 0 0 #f79d3c, 0 2px 0 0 #f79d3c, 0 5px 3px #999999;
        }
        button.btn-info.dim {
          box-shadow: inset 0 0 0 #1eacae, 0 5px 0 0 #1eacae, 0 10px 5px #999999;
        }
        button.btn-info.dim:active {
          box-shadow: inset 0 0 0 #1eacae, 0 2px 0 0 #1eacae, 0 5px 3px #999999;
        }
        button.btn-success.dim {
          box-shadow: inset 0 0 0 #1872ab, 0 5px 0 0 #1872ab, 0 10px 5px #999999;
        }
        button.btn-success.dim:active {
          box-shadow: inset 0 0 0 #1872ab, 0 2px 0 0 #1872ab, 0 5px 3px #999999;
        }
        button.btn-danger.dim {
          box-shadow: inset 0 0 0 #ea394c, 0 5px 0 0 #ea394c, 0 10px 5px #999999;
        }
        button.btn-danger.dim:active {
          box-shadow: inset 0 0 0 #ea394c, 0 2px 0 0 #ea394c, 0 5px 3px #999999;
        }
        button.dim:before {
          font-size: 50px;
          line-height: 1em;
          font-weight: normal;
          color: #fff;
          display: block;
          padding-top: 10px;
        }
        button.dim:active:before {
          top: 7px;
          font-size: 50px;
        }
        .btn:focus {
          outline: none !important;
        }
        .label {
          background-color: #d1dade;
          color: #5e5e5e;
          font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
          font-size: 10px;
          font-weight: 600;
          padding: 3px 8px;
          text-shadow: none;
        }
        .badge {
          background-color: #d1dade;
          color: #5e5e5e;
          font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
          font-size: 11px;
          font-weight: 600;
          padding-bottom: 4px;
          padding-left: 6px;
          padding-right: 6px;
          text-shadow: none;
        }
        .label-primary,
        .badge-primary {
          background-color: #1ab394;
          color: #FFFFFF;
        }
        .label-success,
        .badge-success {
          background-color: #1c84c6;
          color: #FFFFFF;
        }
        .label-warning,
        .badge-warning {
          background-color: #f8ac59;
          color: #FFFFFF;
        }
        .label-warning-light,
        .badge-warning-light {
          background-color: #f8ac59;
          color: #ffffff;
        }
        .label-danger,
        .badge-danger {
          background-color: #ed5565;
          color: #FFFFFF;
        }
        .label-info,
        .badge-info {
          background-color: #23c6c8;
          color: #FFFFFF;
        }
        .label-inverse,
        .badge-inverse {
          background-color: #262626;
          color: #FFFFFF;
        }
        .label-white,
        .badge-white {
          background-color: #FFFFFF;
          color: #5E5E5E;
        }
        .label-white,
        .badge-disable {
          background-color: #2A2E36;
          color: #8B91A0;
        }
        /* TOOGLE SWICH */
        .onoffswitch {
          position: relative;
          width: 64px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
        }
        .onoffswitch-checkbox {
          display: none;
        }
        .onoffswitch-label {
          display: block;
          overflow: hidden;
          cursor: pointer;
          border: 2px solid #1ab394;
          border-radius: 2px;
        }
        .onoffswitch-inner {
          width: 200%;
          margin-left: -100%;
          -moz-transition: margin 0.3s ease-in 0s;
          -webkit-transition: margin 0.3s ease-in 0s;
          -o-transition: margin 0.3s ease-in 0s;
          transition: margin 0.3s ease-in 0s;
        }
        .onoffswitch-inner:before,
        .onoffswitch-inner:after {
          float: left;
          width: 50%;
          height: 20px;
          padding: 0;
          line-height: 20px;
          font-size: 12px;
          color: white;
          font-family: Trebuchet, Arial, sans-serif;
          font-weight: bold;
          -moz-box-sizing: border-box;
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
        }
        .onoffswitch-inner:before {
          content: "ON";
          padding-left: 10px;
          background-color: #1ab394;
          color: #FFFFFF;
        }
        .onoffswitch-inner:after {
          content: "OFF";
          padding-right: 10px;
          background-color: #FFFFFF;
          color: #999999;
          text-align: right;
        }
        .onoffswitch-switch {
          width: 20px;
          margin: 0;
          background: #FFFFFF;
          border: 2px solid #1ab394;
          border-radius: 2px;
          position: absolute;
          top: 0;
          bottom: 0;
          right: 44px;
          -moz-transition: all 0.3s ease-in 0s;
          -webkit-transition: all 0.3s ease-in 0s;
          -o-transition: all 0.3s ease-in 0s;
          transition: all 0.3s ease-in 0s;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
          margin-left: 0;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
          right: 0;
        }
        .onoffswitch-checkbox:disabled + .onoffswitch-label .onoffswitch-inner:before {
          background-color: #919191;
        }
        .onoffswitch-checkbox:disabled + .onoffswitch-label,
        .onoffswitch-checkbox:disabled + .onoffswitch-label .onoffswitch-switch {
          border-color: #919191;
        }
        /* CHOSEN PLUGIN */
        .chosen-container-single .chosen-single {
          background: #ffffff;
          box-shadow: none;
          -moz-box-sizing: border-box;
          border-radius: 2px;
          cursor: text;
          height: auto !important;
          margin: 0;
          min-height: 30px;
          overflow: hidden;
          padding: 4px 12px;
          position: relative;
          width: 100%;
        }
        .chosen-container-multi .chosen-choices li.search-choice {
          background: #f1f1f1;
          border: 1px solid #e5e6e7;
          border-radius: 2px;
          box-shadow: none;
          color: #333333;
          cursor: default;
          line-height: 13px;
          margin: 3px 0 3px 5px;
          padding: 3px 20px 3px 5px;
          position: relative;
        }
        /* Tags Input Plugin */
        .bootstrap-tagsinput {
          border: 1px solid #e5e6e7;
          box-shadow: none;
        }
        /* PAGINATIN */
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
          background-color: #f4f4f4;
          border-color: #DDDDDD;
          color: inherit;
          cursor: default;
          z-index: 2;
        }
        .pagination > li > a,
        .pagination > li > span {
          background-color: #FFFFFF;
          border: 1px solid #DDDDDD;
          color: inherit;
          float: left;
          line-height: 1.42857;
          margin-left: -1px;
          padding: 4px 10px;
          position: relative;
          text-decoration: none;
        }
        /* TOOLTIPS */
        .tooltip-inner {
          background-color: #2F4050;
        }
        .tooltip.top .tooltip-arrow {
          border-top-color: #2F4050;
        }
        .tooltip.right .tooltip-arrow {
          border-right-color: #2F4050;
        }
        .tooltip.bottom .tooltip-arrow {
          border-bottom-color: #2F4050;
        }
        .tooltip.left .tooltip-arrow {
          border-left-color: #2F4050;
        }
        /* EASY PIE CHART*/
        .easypiechart {
          position: relative;
          text-align: center;
        }
        .easypiechart .h2 {
          margin-left: 10px;
          margin-top: 10px;
          display: inline-block;
        }
        .easypiechart canvas {
          top: 0;
          left: 0;
        }
        .easypiechart .easypie-text {
          line-height: 1;
          position: absolute;
          top: 33px;
          width: 100%;
          z-index: 1;
        }
        .easypiechart img {
          margin-top: -4px;
        }
        .jqstooltip {
          -webkit-box-sizing: content-box;
          -moz-box-sizing: content-box;
          box-sizing: content-box;
        }
        /* FULLCALENDAR */
        .fc-state-default {
          background-color: #ffffff;
          background-image: none;
          background-repeat: repeat-x;
          box-shadow: none;
          color: #333333;
          text-shadow: none;
        }
        .fc-state-default {
          border: 1px solid;
        }
        .fc-button {
          color: inherit;
          border: 1px solid #e7eaec;
          cursor: pointer;
          display: inline-block;
          height: 1.9em;
          line-height: 1.9em;
          overflow: hidden;
          padding: 0 0.6em;
          position: relative;
          white-space: nowrap;
        }
        .fc-state-active {
          background-color: #1ab394;
          border-color: #1ab394;
          color: #ffffff;
        }
        .fc-header-title h2 {
          font-size: 16px;
          font-weight: 600;
          color: inherit;
        }
        .fc-content .fc-widget-header,
        .fc-content .fc-widget-content {
          border-color: #e7eaec;
          font-weight: normal;
        }
        .fc-border-separate tbody {
          background-color: #F8F8F8;
        }
        .fc-state-highlight {
          background: none repeat scroll 0 0 #FCF8E3;
        }
        .external-event {
          padding: 5px 10px;
          border-radius: 2px;
          cursor: pointer;
          margin-bottom: 5px;
        }
        .fc-ltr .fc-event-hori.fc-event-end,
        .fc-rtl .fc-event-hori.fc-event-start {
          border-radius: 2px;
        }
        .fc-event,
        .fc-agenda .fc-event-time,
        .fc-event a {
          padding: 4px 6px;
          background-color: #1ab394;
          /* background color */
          border-color: #1ab394;
          /* border color */
        }
        .fc-event-time,
        .fc-event-title {
          color: #717171;
          padding: 0 1px;
        }
        .ui-calendar .fc-event-time,
        .ui-calendar .fc-event-title {
          color: #fff;
        }
        /* Chat */
        .chat-activity-list .chat-element {
          border-bottom: 1px solid #e7eaec;
        }
        .chat-element:first-child {
          margin-top: 0;
        }
        .chat-element {
          padding-bottom: 15px;
        }
        .chat-element,
        .chat-element .media {
          margin-top: 15px;
        }
        .chat-element,
        .media-body {
          overflow: hidden;
        }
        .media-body {
          display: block;
          width: auto;
        }
        .chat-element > .pull-left {
          margin-right: 10px;
        }
        .chat-element img.img-circle,
        .dropdown-messages-box img.img-circle {
          width: 38px;
          height: 38px;
        }
        .chat-element .well {
          border: 1px solid #e7eaec;
          box-shadow: none;
          margin-top: 10px;
          margin-bottom: 5px;
          padding: 10px 20px;
          font-size: 11px;
          line-height: 16px;
        }
        .chat-element .actions {
          margin-top: 10px;
        }
        .chat-element .photos {
          margin: 10px 0;
        }
        .right.chat-element > .pull-right {
          margin-left: 10px;
        }
        .chat-photo {
          max-height: 180px;
          border-radius: 4px;
          overflow: hidden;
          margin-right: 10px;
          margin-bottom: 10px;
        }
        .chat {
          margin: 0;
          padding: 0;
          list-style: none;
        }
        .chat li {
          margin-bottom: 10px;
          padding-bottom: 5px;
          border-bottom: 1px dotted #B3A9A9;
        }
        .chat li.left .chat-body {
          margin-left: 60px;
        }
        .chat li.right .chat-body {
          margin-right: 60px;
        }
        .chat li .chat-body p {
          margin: 0;
          color: #777777;
        }
        .panel .slidedown .glyphicon,
        .chat .glyphicon {
          margin-right: 5px;
        }
        .chat-panel .panel-body {
          height: 350px;
          overflow-y: scroll;
        }
        /* LIST GROUP */
        a.list-group-item.active,
        a.list-group-item.active:hover,
        a.list-group-item.active:focus {
          background-color: #1ab394;
          border-color: #1ab394;
          color: #FFFFFF;
          z-index: 2;
        }
        .list-group-item-heading {
          margin-top: 10px;
        }
        .list-group-item-text {
          margin: 0 0 10px;
          color: inherit;
          font-size: 12px;
          line-height: inherit;
        }
        .no-padding .list-group-item {
          border-left: none;
          border-right: none;
          border-bottom: none;
        }
        .no-padding .list-group-item:first-child {
          border-left: none;
          border-right: none;
          border-bottom: none;
          border-top: none;
        }
        .no-padding .list-group {
          margin-bottom: 0;
        }
        .list-group-item {
          background-color: inherit;
          border: 1px solid #e7eaec;
          display: block;
          margin-bottom: -1px;
          padding: 10px 15px;
          position: relative;
        }
        .elements-list .list-group-item {
          border-left: none;
          border-right: none;
          padding: 15px 25px;
        }
        .elements-list .list-group-item:first-child {
          border-left: none;
          border-right: none;
          border-top: none !important;
        }
        .elements-list .list-group {
          margin-bottom: 0;
        }
        .elements-list a {
          color: inherit;
        }
        .elements-list .list-group-item.active,
        .elements-list .list-group-item:hover {
          background: #f3f3f4;
          color: inherit;
          border-color: #e7eaec;
          /*border-bottom: 1px solid #e7eaec;*/
          /*border-top: 1px solid #e7eaec;*/
          border-radius: 0;
        }
        .elements-list li.active {
          transition: none;
        }
        .element-detail-box {
          padding: 25px;
        }
        /* FLOT CHART  */
        .flot-chart {
          display: block;
          height: 200px;
        }
        .widget .flot-chart.dashboard-chart {
          display: block;
          height: 120px;
          margin-top: 40px;
        }
        .flot-chart.dashboard-chart {
          display: block;
          height: 180px;
          margin-top: 40px;
        }
        .flot-chart-content {
          width: 100%;
          height: 100%;
        }
        .flot-chart-pie-content {
          width: 200px;
          height: 200px;
          margin: auto;
        }
        .jqstooltip {
          position: absolute;
          display: block;
          left: 0;
          top: 0;
          visibility: hidden;
          background: #2b303a;
          background-color: rgba(43, 48, 58, 0.8);
          color: white;
          text-align: left;
          white-space: nowrap;
          z-index: 10000;
          padding: 5px 5px 5px 5px;
          min-height: 22px;
          border-radius: 3px;
        }
        .jqsfield {
          color: white;
          text-align: left;
        }
        .fh-150 {
          height: 150px;
        }
        .fh-200 {
          height: 200px;
        }
        .h-150 {
          min-height: 150px;
        }
        .h-200 {
          min-height: 200px;
        }
        .h-300 {
          min-height: 300px;
        }
        .w-150 {
          min-width: 150px;
        }
        .w-200 {
          min-width: 200px;
        }
        .w-300 {
          min-width: 300px;
        }
        .legendLabel {
          padding-left: 5px;
        }
        .stat-list li:first-child {
          margin-top: 0;
        }
        .stat-list {
          list-style: none;
          padding: 0;
          margin: 0;
        }
        .stat-percent {
          float: right;
        }
        .stat-list li {
          margin-top: 15px;
          position: relative;
        }
        /* DATATABLES */
        table.dataTable thead .sorting,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc,
        table.dataTable thead .sorting_asc_disabled,
        table.dataTable thead .sorting_desc_disabled {
          background: transparent;
        }
        .dataTables_wrapper {
          padding-bottom: 30px;
        }
        .dataTables_length {
          float: left;
        }
        .dataTables_filter label {
          margin-right: 5px;
        }
        .html5buttons {
          float: right;
        }
        .html5buttons a {
          border: 1px solid #e7eaec;
          background: #fff;
          color: #676a6c;
          box-shadow: none;
          padding: 6px 8px;
          font-size: 12px;
        }
        .html5buttons a:hover,
        .html5buttons a:focus:active {
          background-color: #eee;
          color: inherit;
          border-color: #d2d2d2;
        }
        div.dt-button-info {
          z-index: 100;
        }
        @media (max-width: 768px) {
          .html5buttons {
            float: none;
            margin-top: 10px;
          }
          .dataTables_length {
            float: none;
          }
        }
        /* CIRCLE */
        .img-circle {
          border-radius: 50%;
        }
        .btn-circle {
          width: 30px;
          height: 30px;
          padding: 6px 0;
          border-radius: 15px;
          text-align: center;
          font-size: 12px;
          line-height: 1.428571429;
        }
        .btn-circle.btn-lg {
          width: 50px;
          height: 50px;
          padding: 10px 16px;
          border-radius: 25px;
          font-size: 18px;
          line-height: 1.33;
        }
        .btn-circle.btn-xl {
          width: 70px;
          height: 70px;
          padding: 10px 16px;
          border-radius: 35px;
          font-size: 24px;
          line-height: 1.33;
        }
        .show-grid [class^="col-"] {
          padding-top: 10px;
          padding-bottom: 10px;
          border: 1px solid #ddd;
          background-color: #eee !important;
        }
        .show-grid {
          margin: 15px 0;
        }
        /* ANIMATION */
        .css-animation-box h1 {
          font-size: 44px;
        }
        .animation-efect-links a {
          padding: 4px 6px;
          font-size: 12px;
        }
        #animation_box {
          background-color: #f9f8f8;
          border-radius: 16px;
          width: 80%;
          margin: 0 auto;
          padding-top: 80px;
        }
        .animation-text-box {
          position: absolute;
          margin-top: 40px;
          left: 50%;
          margin-left: -100px;
          width: 200px;
        }
        .animation-text-info {
          position: absolute;
          margin-top: -60px;
          left: 50%;
          margin-left: -100px;
          width: 200px;
          font-size: 10px;
        }
        .animation-text-box h2 {
          font-size: 54px;
          font-weight: 600;
          margin-bottom: 5px;
        }
        .animation-text-box p {
          font-size: 12px;
          text-transform: uppercase;
        }
        /* PEACE */
        .pace {
          -webkit-pointer-events: none;
          pointer-events: none;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
        .pace-inactive {
          display: none;
        }
        .pace .pace-progress {
          background: #1ab394;
          position: fixed;
          z-index: 2040;
          top: 0;
          right: 100%;
          width: 100%;
          height: 2px;
        }
        .pace-inactive {
          display: none;
        }
        /* WIDGETS */
        .widget {
          border-radius: 5px;
          padding: 15px 20px;
          margin-bottom: 10px;
          margin-top: 10px;
        }
        .widget.style1 h2 {
          font-size: 30px;
        }
        .widget h2,
        .widget h3 {
          margin-top: 5px;
          margin-bottom: 0;
        }
        .widget-text-box {
          padding: 20px;
          border: 1px solid #e7eaec;
          background: #ffffff;
        }
        .widget-head-color-box {
          border-radius: 5px 5px 0 0;
          margin-top: 10px;
        }
        .widget .flot-chart {
          height: 100px;
        }
        .vertical-align div {
          display: inline-block;
          vertical-align: middle;
        }
        .vertical-align h2,
        .vertical-align h3 {
          margin: 0;
        }
        .todo-list {
          list-style: none outside none;
          margin: 0;
          padding: 0;
          font-size: 14px;
        }
        .todo-list.small-list {
          font-size: 12px;
        }
        .todo-list.small-list > li {
          background: #f3f3f4;
          border-left: none;
          border-right: none;
          border-radius: 4px;
          color: inherit;
          margin-bottom: 2px;
          padding: 6px 6px 6px 12px;
        }
        .todo-list.small-list .btn-xs,
        .todo-list.small-list .btn-group-xs > .btn {
          border-radius: 5px;
          font-size: 10px;
          line-height: 1.5;
          padding: 1px 2px 1px 5px;
        }
        .todo-list > li {
          background: #f3f3f4;
          border-left: 6px solid #e7eaec;
          border-right: 6px solid #e7eaec;
          border-radius: 4px;
          color: inherit;
          margin-bottom: 2px;
          padding: 10px;
        }
        .todo-list .handle {
          cursor: move;
          display: inline-block;
          font-size: 16px;
          margin: 0 5px;
        }
        .todo-list > li .label {
          font-size: 9px;
          margin-left: 10px;
        }
        .check-link {
          font-size: 16px;
        }
        .todo-completed {
          text-decoration: line-through;
        }
        .geo-statistic h1 {
          font-size: 36px;
          margin-bottom: 0;
        }
        .glyphicon.fa {
          font-family: "FontAwesome";
        }
        /* INPUTS */
        .inline {
          display: inline-block !important;
        }
        .input-s-sm {
          width: 120px;
        }
        .input-s {
          width: 200px;
        }
        .input-s-lg {
          width: 250px;
        }
        .i-checks {
          padding-left: 0;
        }
        .form-control,
        .single-line {
          background-color: #FFFFFF;
          background-image: none;
          border: 1px solid #e5e6e7;
          border-radius: 1px;
          color: inherit;
          display: block;
          padding: 6px 12px;
          transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
          width: 100%;
          font-size: 14px;
        }
        .form-control:focus,
        .single-line:focus {
          border-color: #1ab394 !important;
        }
        .has-success .form-control {
          border-color: #1ab394;
        }
        .has-warning .form-control {
          border-color: #f8ac59;
        }
        .has-error .form-control {
          border-color: #ed5565;
        }
        .has-success .control-label {
          color: #1ab394;
        }
        .has-warning .control-label {
          color: #f8ac59;
        }
        .has-error .control-label {
          color: #ed5565;
        }
        .input-group-addon {
          background-color: #fff;
          border: 1px solid #E5E6E7;
          border-radius: 1px;
          color: inherit;
          font-size: 14px;
          font-weight: 400;
          line-height: 1;
          padding: 6px 12px;
          text-align: center;
        }
        .spinner-buttons.input-group-btn .btn-xs {
          line-height: 1.13;
        }
        .spinner-buttons.input-group-btn {
          width: 20%;
        }
        .noUi-connect {
          background: none repeat scroll 0 0 #1ab394;
          box-shadow: none;
        }
        .slider_red .noUi-connect {
          background: none repeat scroll 0 0 #ed5565;
          box-shadow: none;
        }
        /* UI Sortable */
        .ui-sortable .ibox-title {
          cursor: move;
        }
        .ui-sortable-placeholder {
          border: 1px dashed #cecece !important;
          visibility: visible !important;
          background: #e7eaec;
        }
        .ibox.ui-sortable-placeholder {
          margin: 0 0 23px !important;
        }
        /* SWITCHES */
        .onoffswitch {
          position: relative;
          width: 54px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
        }
        .onoffswitch-checkbox {
          display: none;
        }
        .onoffswitch-label {
          display: block;
          overflow: hidden;
          cursor: pointer;
          border: 2px solid #1AB394;
          border-radius: 3px;
        }
        .onoffswitch-inner {
          display: block;
          width: 200%;
          margin-left: -100%;
          -moz-transition: margin 0.3s ease-in 0s;
          -webkit-transition: margin 0.3s ease-in 0s;
          -o-transition: margin 0.3s ease-in 0s;
          transition: margin 0.3s ease-in 0s;
        }
        .onoffswitch-inner:before,
        .onoffswitch-inner:after {
          display: block;
          float: left;
          width: 50%;
          height: 16px;
          padding: 0;
          line-height: 16px;
          font-size: 10px;
          color: white;
          font-family: Trebuchet, Arial, sans-serif;
          font-weight: bold;
          -moz-box-sizing: border-box;
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
        }
        .onoffswitch-inner:before {
          content: "ON";
          padding-left: 7px;
          background-color: #1AB394;
          color: #FFFFFF;
        }
        .onoffswitch-inner:after {
          content: "OFF";
          padding-right: 7px;
          background-color: #FFFFFF;
          color: #919191;
          text-align: right;
        }
        .onoffswitch-switch {
          display: block;
          width: 18px;
          margin: 0;
          background: #FFFFFF;
          border: 2px solid #1AB394;
          border-radius: 3px;
          position: absolute;
          top: 0;
          bottom: 0;
          right: 36px;
          -moz-transition: all 0.3s ease-in 0s;
          -webkit-transition: all 0.3s ease-in 0s;
          -o-transition: all 0.3s ease-in 0s;
          transition: all 0.3s ease-in 0s;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
          margin-left: 0;
        }
        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
          right: 0;
        }
        /* jqGrid */
        .ui-jqgrid {
          -moz-box-sizing: content-box;
        }
        .ui-jqgrid-btable {
          border-collapse: separate;
        }
        .ui-jqgrid-htable {
          border-collapse: separate;
        }
        .ui-jqgrid-titlebar {
          height: 40px;
          line-height: 15px;
          color: #676a6c;
          background-color: #F9F9F9;
          text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
        }
        .ui-jqgrid .ui-jqgrid-title {
          float: left;
          margin: 1.1em 1em 0.2em;
        }
        .ui-jqgrid .ui-jqgrid-titlebar {
          position: relative;
          border-left: 0 solid;
          border-right: 0 solid;
          border-top: 0 solid;
        }
        .ui-widget-header {
          background: none;
          background-image: none;
          background-color: #f5f5f6;
          text-transform: uppercase;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }
        .ui-jqgrid tr.ui-row-ltr td {
          border-right-color: inherit;
          border-right-style: solid;
          border-right-width: 1px;
          text-align: left;
          border-color: #DDDDDD;
          background-color: inherit;
        }
        .ui-search-toolbar input[type="text"] {
          font-size: 12px;
          height: 15px;
          border: 1px solid #CCCCCC;
          border-radius: 0;
        }
        .ui-state-default,
        .ui-widget-content .ui-state-default,
        .ui-widget-header .ui-state-default {
          background: #F9F9F9;
          border: 1px solid #DDDDDD;
          line-height: 15px;
          font-weight: bold;
          color: #676a6c;
          text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
        }
        .ui-widget-content {
          box-sizing: content-box;
        }
        .ui-icon-triangle-1-n {
          background-position: 1px -16px;
        }
        .ui-jqgrid tr.ui-search-toolbar th {
          border-top-width: 0 !important;
          border-top-color: inherit !important;
          border-top-style: ridge !important;
        }
        .ui-state-hover,
        .ui-widget-content .ui-state-hover,
        .ui-state-focus,
        .ui-widget-content .ui-state-focus,
        .ui-widget-header .ui-state-focus {
          background: #f5f5f5;
          border-collapse: separate;
        }
        .ui-state-highlight,
        .ui-widget-content .ui-state-highlight,
        .ui-widget-header .ui-state-highlight {
          background: #f2fbff;
        }
        .ui-state-active,
        .ui-widget-content .ui-state-active,
        .ui-widget-header .ui-state-active {
          border: 1px solid #dddddd;
          background: #ffffff;
          font-weight: normal;
          color: #212121;
        }
        .ui-jqgrid .ui-pg-input {
          font-size: inherit;
          width: 50px;
          border: 1px solid #CCCCCC;
          height: 15px;
        }
        .ui-jqgrid .ui-pg-selbox {
          display: block;
          font-size: 1em;
          height: 25px;
          line-height: 18px;
          margin: 0;
          width: auto;
        }
        .ui-jqgrid .ui-pager-control {
          position: relative;
        }
        .ui-jqgrid .ui-jqgrid-pager {
          height: 32px;
          position: relative;
        }
        .ui-pg-table .navtable .ui-corner-all {
          border-radius: 0;
        }
        .ui-jqgrid .ui-pg-button:hover {
          padding: 1px;
          border: 0;
        }
        .ui-jqgrid .loading {
          position: absolute;
          top: 45%;
          left: 45%;
          width: auto;
          height: auto;
          z-index: 101;
          padding: 6px;
          margin: 5px;
          text-align: center;
          font-weight: bold;
          display: none;
          border-width: 2px !important;
          font-size: 11px;
        }
        .ui-jqgrid .form-control {
          height: 10px;
          width: auto;
          display: inline;
          padding: 10px 12px;
        }
        .ui-jqgrid-pager {
          height: 32px;
        }
        .ui-corner-all,
        .ui-corner-top,
        .ui-corner-left,
        .ui-corner-tl {
          border-top-left-radius: 0;
        }
        .ui-corner-all,
        .ui-corner-top,
        .ui-corner-right,
        .ui-corner-tr {
          border-top-right-radius: 0;
        }
        .ui-corner-all,
        .ui-corner-bottom,
        .ui-corner-left,
        .ui-corner-bl {
          border-bottom-left-radius: 0;
        }
        .ui-corner-all,
        .ui-corner-bottom,
        .ui-corner-right,
        .ui-corner-br {
          border-bottom-right-radius: 0;
        }
        .ui-widget-content {
          border: 1px solid #ddd;
        }
        .ui-jqgrid .ui-jqgrid-titlebar {
          padding: 0;
        }
        .ui-jqgrid .ui-jqgrid-titlebar {
          border-bottom: 1px solid #ddd;
        }
        .ui-jqgrid tr.jqgrow td {
          padding: 6px;
        }
        .ui-jqdialog .ui-jqdialog-titlebar {
          padding: 10px 10px;
        }
        .ui-jqdialog .ui-jqdialog-title {
          float: none !important;
        }
        .ui-jqdialog > .ui-resizable-se {
          position: absolute;
        }
        /* Nestable list */
        .dd {
          position: relative;
          display: block;
          margin: 0;
          padding: 0;
          list-style: none;
          font-size: 13px;
          line-height: 20px;
        }
        .dd-list {
          display: block;
          position: relative;
          margin: 0;
          padding: 0;
          list-style: none;
        }
        .dd-list .dd-list {
          padding-left: 30px;
        }
        .dd-collapsed .dd-list {
          display: none;
        }
        .dd-item,
        .dd-empty,
        .dd-placeholder {
          display: block;
          position: relative;
          margin: 0;
          padding: 0;
          min-height: 20px;
          font-size: 13px;
          line-height: 20px;
        }
        .dd-handle {
          display: block;
          margin: 5px 0;
          padding: 5px 10px;
          color: #333;
          text-decoration: none;
          border: 1px solid #e7eaec;
          background: #f5f5f5;
          -webkit-border-radius: 3px;
          border-radius: 3px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
        }
        .dd-handle span {
          font-weight: bold;
        }
        .dd-handle:hover {
          background: #f0f0f0;
          cursor: pointer;
          font-weight: bold;
        }
        .dd-item > button {
          display: block;
          position: relative;
          cursor: pointer;
          float: left;
          width: 25px;
          height: 20px;
          margin: 5px 0;
          padding: 0;
          text-indent: 100%;
          white-space: nowrap;
          overflow: hidden;
          border: 0;
          background: transparent;
          font-size: 12px;
          line-height: 1;
          text-align: center;
          font-weight: bold;
        }
        .dd-item > button:before {
          content: '+';
          display: block;
          position: absolute;
          width: 100%;
          text-align: center;
          text-indent: 0;
        }
        .dd-item > button[data-action="collapse"]:before {
          content: '-';
        }
        #nestable2 .dd-item > button {
          font-family: FontAwesome;
          height: 34px;
          width: 33px;
          color: #c1c1c1;
        }
        #nestable2 .dd-item > button:before {
          content: "\f067";
        }
        #nestable2 .dd-item > button[data-action="collapse"]:before {
          content: "\f068";
        }
        .dd-placeholder,
        .dd-empty {
          margin: 5px 0;
          padding: 0;
          min-height: 30px;
          background: #f2fbff;
          border: 1px dashed #b6bcbf;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
        }
        .dd-empty {
          border: 1px dashed #bbb;
          min-height: 100px;
          background-color: #e5e5e5;
          background-image: -webkit-linear-gradient(45deg, #ffffff 25%, transparent 25%, transparent 75%, #ffffff 75%, #ffffff), -webkit-linear-gradient(45deg, #ffffff 25%, transparent 25%, transparent 75%, #ffffff 75%, #ffffff);
          background-image: -moz-linear-gradient(45deg, #ffffff 25%, transparent 25%, transparent 75%, #ffffff 75%, #ffffff), -moz-linear-gradient(45deg, #ffffff 25%, transparent 25%, transparent 75%, #ffffff 75%, #ffffff);
          background-image: linear-gradient(45deg, #ffffff 25%, transparent 25%, transparent 75%, #ffffff 75%, #ffffff), linear-gradient(45deg, #ffffff 25%, transparent 25%, transparent 75%, #ffffff 75%, #ffffff);
          background-size: 60px 60px;
          background-position: 0 0, 30px 30px;
        }
        .dd-dragel {
          position: absolute;
          z-index: 9999;
          pointer-events: none;
        }
        .dd-dragel > .dd-item .dd-handle {
          margin-top: 0;
        }
        .dd-dragel .dd-handle {
          -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.1);
          box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.1);
        }
        /**
        * Nestable Extras
        */
        .nestable-lists {
          display: block;
          clear: both;
          padding: 30px 0;
          width: 100%;
          border: 0;
          border-top: 2px solid #ddd;
          border-bottom: 2px solid #ddd;
        }
        #nestable-menu {
          padding: 0;
          margin: 10px 0 20px 0;
        }
        #nestable-output,
        #nestable2-output {
          width: 100%;
          font-size: 0.75em;
          line-height: 1.333333em;
          font-family: open sans, lucida grande, lucida sans unicode, helvetica, arial, sans-serif;
          padding: 5px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
        }
        #nestable2 .dd-handle {
          color: inherit;
          border: 1px dashed #e7eaec;
          background: #f3f3f4;
          padding: 10px;
        }
        #nestable2 .dd-handle:hover {
          /*background: #bbb;*/
        }
        #nestable2 span.label {
          margin-right: 10px;
        }
        #nestable-output,
        #nestable2-output {
          font-size: 12px;
          padding: 25px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
        }
        /* CodeMirror */
        .CodeMirror {
          border: 1px solid #eee;
          height: auto;
        }
        .CodeMirror-scroll {
          overflow-y: hidden;
          overflow-x: auto;
        }
        /* Google Maps */
        .google-map {
          height: 300px;
        }
        /* Validation */
        label.error {
          color: #cc5965;
          display: inline-block;
          margin-left: 5px;
        }
        .form-control.error {
          border: 1px dotted #cc5965;
        }
        /* ngGrid */
        .gridStyle {
          border: 1px solid #d4d4d4;
          width: 100%;
          height: 400px;
        }
        .gridStyle2 {
          border: 1px solid #d4d4d4;
          width: 500px;
          height: 300px;
        }
        .ngH eaderCell {
          border-right: none;
          border-bottom: 1px solid #e7eaec;
        }
        .ngCell {
          border-right: none;
        }
        .ngTopPanel {
          background: #F5F5F6;
        }
        .ngRow.even {
          background: #f9f9f9;
        }
        .ngRow.selected {
          background: #EBF2F1;
        }
        .ngRow {
          border-bottom: 1px solid #e7eaec;
        }
        .ngCell {
          background-color: transparent;
        }
        .ngHeaderCell {
          border-right: none;
        }
        /* Toastr custom style */
        #toast-container > .toast {
          background-image: none !important;
        }
        #toast-container > .toast:before {
          position: fixed;
          font-family: FontAwesome;
          font-size: 24px;
          line-height: 24px;
          float: left;
          color: #FFF;
          padding-right: 0.5em;
          margin: auto 0.5em auto -1.5em;
        }
        #toast-container > .toast-warning:before {
          content: "\f0e7";
        }
        #toast-container > .toast-error:before {
          content: "\f071";
        }
        #toast-container > .toast-info:before {
          content: "\f005";
        }
        #toast-container > .toast-success:before {
          content: "\f00C";
        }
        #toast-container > div {
          -moz-box-shadow: 0 0 3px #999;
          -webkit-box-shadow: 0 0 3px #999;
          box-shadow: 0 0 3px #999;
          opacity: .9;
          -ms-filter: alpha(opacity=90);
          filter: alpha(opacity=90);
        }
        #toast-container > :hover {
          -moz-box-shadow: 0 0 4px #999;
          -webkit-box-shadow: 0 0 4px #999;
          box-shadow: 0 0 4px #999;
          opacity: 1;
          -ms-filter: alpha(opacity=100);
          filter: alpha(opacity=100);
          cursor: pointer;
        }
        .toast {
          background-color: #1ab394;
        }
        .toast-success {
          background-color: #1ab394;
        }
        .toast-error {
          background-color: #ed5565;
        }
        .toast-info {
          background-color: #23c6c8;
        }
        .toast-warning {
          background-color: #f8ac59;
        }
        .toast-top-full-width {
          margin-top: 20px;
        }
        .toast-bottom-full-width {
          margin-bottom: 20px;
        }
        /* Notifie */
        .cg-notify-message.inspinia-notify {
          background: #fff;
          padding: 0;
          box-shadow: 0 0 1px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.2);
          -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.2);
          -moz-box-shadow: 0 0 1px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.2);
          border: none;
          margin-top: 30px;
          color: inherit;
        }
        .inspinia-notify.alert-warning {
          border-left: 6px solid #f8ac59;
        }
        .inspinia-notify.alert-success {
          border-left: 6px solid #1c84c6;
        }
        .inspinia-notify.alert-danger {
          border-left: 6px solid #ed5565;
        }
        .inspinia-notify.alert-info {
          border-left: 6px solid #1ab394;
        }
        /* Image cropper style */
        .img-container,
        .img-preview {
          overflow: hidden;
          text-align: center;
          width: 100%;
        }
        .img-preview-sm {
          height: 130px;
          width: 200px;
        }
        /* Forum styles  */
        .forum-post-container .media {
          margin: 10px 10px 10px 10px;
          padding: 20px 10px 20px 10px;
          border-bottom: 1px solid #f1f1f1;
        }
        .forum-avatar {
          float: left;
          margin-right: 20px;
          text-align: center;
          width: 110px;
        }
        .forum-avatar .img-circle {
          height: 48px;
          width: 48px;
        }
        .author-info {
          color: #676a6c;
          font-size: 11px;
          margin-top: 5px;
          text-align: center;
        }
        .forum-post-info {
          padding: 9px 12px 6px 12px;
          background: #f9f9f9;
          border: 1px solid #f1f1f1;
        }
        .media-body > .media {
          background: #f9f9f9;
          border-radius: 3px;
          border: 1px solid #f1f1f1;
        }
        .forum-post-container .media-body .photos {
          margin: 10px 0;
        }
        .forum-photo {
          max-width: 140px;
          border-radius: 3px;
        }
        .media-body > .media .forum-avatar {
          width: 70px;
          margin-right: 10px;
        }
        .media-body > .media .forum-avatar .img-circle {
          height: 38px;
          width: 38px;
        }
        .mid-icon {
          font-size: 66px;
        }
        .forum-item {
          margin: 10px 0;
          padding: 10px 0 20px;
          border-bottom: 1px solid #f1f1f1;
        }
        .views-number {
          font-size: 24px;
          line-height: 18px;
          font-weight: 400;
        }
        .forum-container,
        .forum-post-container {
          padding: 30px !important;
        }
        .forum-item small {
          color: #999;
        }
        .forum-item .forum-sub-title {
          color: #999;
          margin-left: 50px;
        }
        .forum-title {
          margin: 15px 0 15px 0;
        }
        .forum-info {
          text-align: center;
        }
        .forum-desc {
          color: #999;
        }
        .forum-icon {
          float: left;
          width: 30px;
          margin-right: 20px;
          text-align: center;
        }
        a.forum-item-title {
          color: inherit;
          display: block;
          font-size: 18px;
          font-weight: 600;
        }
        a.forum-item-title:hover {
          color: inherit;
        }
        .forum-icon .fa {
          font-size: 30px;
          margin-top: 8px;
          color: #9b9b9b;
        }
        .forum-item.active .fa {
          color: #1ab394;
        }
        .forum-item.active a.forum-item-title {
          color: #1ab394;
        }
        @media (max-width: 992px) {
          .forum-info {
            margin: 15px 0 10px 0;
            /* Comment this is you want to show forum info in small devices */
            display: none;
          }
          .forum-desc {
            float: none !important;
          }
        }
        /* New Timeline style */
        .vertical-container {
          /* this class is used to give a max-width to the element it is applied to, and center it horizontally when it reaches that max-width */
          width: 90%;
          max-width: 1170px;
          margin: 0 auto;
        }
        .vertical-container::after {
          /* clearfix */
          content: '';
          display: table;
          clear: both;
        }
        #vertical-timeline {
          position: relative;
          padding: 0;
          margin-top: 2em;
          margin-bottom: 2em;
        }
        #vertical-timeline::before {
          content: '';
          position: absolute;
          top: 0;
          left: 18px;
          height: 100%;
          width: 4px;
          background: #f1f1f1;
        }
        .vertical-timeline-content .btn {
          float: right;
        }
        #vertical-timeline.light-timeline:before {
          background: #e7eaec;
        }
        .dark-timeline .vertical-timeline-content:before {
          border-color: transparent #f5f5f5 transparent transparent;
        }
        .dark-timeline.center-orientation .vertical-timeline-content:before {
          border-color: transparent transparent transparent #f5f5f5;
        }
        .dark-timeline .vertical-timeline-block:nth-child(2n) .vertical-timeline-content:before,
        .dark-timeline.center-orientation .vertical-timeline-block:nth-child(2n) .vertical-timeline-content:before {
          border-color: transparent #f5f5f5 transparent transparent;
        }
        .dark-timeline .vertical-timeline-content,
        .dark-timeline.center-orientation .vertical-timeline-content {
          background: #f5f5f5;
        }
        @media only screen and (min-width: 1170px) {
          #vertical-timeline.center-orientation {
            margin-top: 3em;
            margin-bottom: 3em;
          }
          #vertical-timeline.center-orientation:before {
            left: 50%;
            margin-left: -2px;
          }
        }
        @media only screen and (max-width: 1170px) {
          .center-orientation.dark-timeline .vertical-timeline-content:before {
            border-color: transparent #f5f5f5 transparent transparent;
          }
        }
        .vertical-timeline-block {
          position: relative;
          margin: 2em 0;
        }
        .vertical-timeline-block:after {
          content: "";
          display: table;
          clear: both;
        }
        .vertical-timeline-block:first-child {
          margin-top: 0;
        }
        .vertical-timeline-block:last-child {
          margin-bottom: 0;
        }
        @media only screen and (min-width: 1170px) {
          .center-orientation .vertical-timeline-block {
            margin: 4em 0;
          }
          .center-orientation .vertical-timeline-block:first-child {
            margin-top: 0;
          }
          .center-orientation .vertical-timeline-block:last-child {
            margin-bottom: 0;
          }
        }
        .vertical-timeline-icon {
          position: absolute;
          top: 0;
          left: 0;
          width: 40px;
          height: 40px;
          border-radius: 50%;
          font-size: 16px;
          border: 3px solid #f1f1f1;
          text-align: center;
        }
        .vertical-timeline-icon i {
          display: block;
          width: 24px;
          height: 24px;
          position: relative;
          left: 50%;
          top: 50%;
          margin-left: -12px;
          margin-top: -9px;
        }
        @media only screen and (min-width: 1170px) {
          .center-orientation .vertical-timeline-icon {
            width: 50px;
            height: 50px;
            left: 50%;
            margin-left: -25px;
            -webkit-transform: translateZ(0);
            -webkit-backface-visibility: hidden;
            font-size: 19px;
          }
          .center-orientation .vertical-timeline-icon i {
            margin-left: -12px;
            margin-top: -10px;
          }
          .center-orientation .cssanimations .vertical-timeline-icon.is-hidden {
            visibility: hidden;
          }
        }
        .vertical-timeline-content {
          position: relative;
          margin-left: 60px;
          background: white;
          border-radius: 0.25em;
          padding: 1em;
        }
        .vertical-timeline-content:after {
          content: "";
          display: table;
          clear: both;
        }
        .vertical-timeline-content h2 {
          font-weight: 400;
          margin-top: 4px;
        }
        .vertical-timeline-content p {
          margin: 1em 0;
          line-height: 1.6;
        }
        .vertical-timeline-content .vertical-date {
          float: left;
          font-weight: 500;
        }
        .vertical-date small {
          color: #1ab394;
          font-weight: 400;
        }
        .vertical-timeline-content::before {
          content: '';
          position: absolute;
          top: 16px;
          right: 100%;
          height: 0;
          width: 0;
          border: 7px solid transparent;
          border-right: 7px solid white;
        }
        @media only screen and (min-width: 768px) {
          .vertical-timeline-content h2 {
            font-size: 18px;
          }
          .vertical-timeline-content p {
            font-size: 13px;
          }
        }
        @media only screen and (min-width: 1170px) {
          .center-orientation .vertical-timeline-content {
            margin-left: 0;
            padding: 1.6em;
            width: 45%;
          }
          .center-orientation .vertical-timeline-content::before {
            top: 24px;
            left: 100%;
            border-color: transparent;
            border-left-color: white;
          }
          .center-orientation .vertical-timeline-content .btn {
            float: left;
          }
          .center-orientation .vertical-timeline-content .vertical-date {
            position: absolute;
            width: 100%;
            left: 122%;
            top: 2px;
            font-size: 14px;
          }
          .center-orientation .vertical-timeline-block:nth-child(even) .vertical-timeline-content {
            float: right;
          }
          .center-orientation .vertical-timeline-block:nth-child(even) .vertical-timeline-content::before {
            top: 24px;
            left: auto;
            right: 100%;
            border-color: transparent;
            border-right-color: white;
          }
          .center-orientation .vertical-timeline-block:nth-child(even) .vertical-timeline-content .btn {
            float: right;
          }
          .center-orientation .vertical-timeline-block:nth-child(even) .vertical-timeline-content .vertical-date {
            left: auto;
            right: 122%;
            text-align: right;
          }
          .center-orientation .cssanimations .vertical-timeline-content.is-hidden {
            visibility: hidden;
          }
        }
        /* Tabs */
        .tabs-container .panel-body {
          background: #fff;
          border: 1px solid #e7eaec;
          border-radius: 2px;
          padding: 20px;
          position: relative;
        }
        .tabs-container .nav-tabs > li.active > a,
        .tabs-container .nav-tabs > li.active > a:hover,
        .tabs-container .nav-tabs > li.active > a:focus {
          border: 1px solid #e7eaec;
          border-bottom-color: transparent;
          background-color: #fff;
        }
        .tabs-container .nav-tabs > li {
          float: left;
          margin-bottom: -1px;
        }
        .tabs-container .tab-pane .panel-body {
          border-top: none;
        }
        .tabs-container .nav-tabs > li.active > a,
        .tabs-container .nav-tabs > li.active > a:hover,
        .tabs-container .nav-tabs > li.active > a:focus {
          border: 1px solid #e7eaec;
          border-bottom-color: transparent;
        }
        .tabs-container .nav-tabs {
          border-bottom: 1px solid #e7eaec;
        }
        .tabs-container .tab-pane .panel-body {
          border-top: none;
        }
        .tabs-container .tabs-left .tab-pane .panel-body,
        .tabs-container .tabs-right .tab-pane .panel-body {
          border-top: 1px solid #e7eaec;
        }
        .tabs-container .nav-tabs > li a:hover {
          background: transparent;
          border-color: transparent;
        }
        .tabs-container .tabs-below > .nav-tabs,
        .tabs-container .tabs-right > .nav-tabs,
        .tabs-container .tabs-left > .nav-tabs {
          border-bottom: 0;
        }
        .tabs-container .tabs-left .panel-body {
          position: static;
        }
        .tabs-container .tabs-left > .nav-tabs,
        .tabs-container .tabs-right > .nav-tabs {
          width: 20%;
        }
        .tabs-container .tabs-left .panel-body {
          width: 80%;
          margin-left: 20%;
        }
        .tabs-container .tabs-right .panel-body {
          width: 80%;
          margin-right: 20%;
        }
        .tabs-container .tab-content > .tab-pane,
        .tabs-container .pill-content > .pill-pane {
          display: none;
        }
        .tabs-container .tab-content > .active,
        .tabs-container .pill-content > .active {
          display: block;
        }
        .tabs-container .tabs-below > .nav-tabs {
          border-top: 1px solid #e7eaec;
        }
        .tabs-container .tabs-below > .nav-tabs > li {
          margin-top: -1px;
          margin-bottom: 0;
        }
        .tabs-container .tabs-below > .nav-tabs > li > a {
          -webkit-border-radius: 0 0 4px 4px;
          -moz-border-radius: 0 0 4px 4px;
          border-radius: 0 0 4px 4px;
        }
        .tabs-container .tabs-below > .nav-tabs > li > a:hover,
        .tabs-container .tabs-below > .nav-tabs > li > a:focus {
          border-top-color: #e7eaec;
          border-bottom-color: transparent;
        }
        .tabs-container .tabs-left > .nav-tabs > li,
        .tabs-container .tabs-right > .nav-tabs > li {
          float: none;
        }
        .tabs-container .tabs-left > .nav-tabs > li > a,
        .tabs-container .tabs-right > .nav-tabs > li > a {
          min-width: 74px;
          margin-right: 0;
          margin-bottom: 3px;
        }
        .tabs-container .tabs-left > .nav-tabs {
          float: left;
          margin-right: 19px;
        }
        .tabs-container .tabs-left > .nav-tabs > li > a {
          margin-right: -1px;
          -webkit-border-radius: 4px 0 0 4px;
          -moz-border-radius: 4px 0 0 4px;
          border-radius: 4px 0 0 4px;
        }
        .tabs-container .tabs-left > .nav-tabs .active > a,
        .tabs-container .tabs-left > .nav-tabs .active > a:hover,
        .tabs-container .tabs-left > .nav-tabs .active > a:focus {
          border-color: #e7eaec transparent #e7eaec #e7eaec;
          *border-right-color: #ffffff;
        }
        .tabs-container .tabs-right > .nav-tabs {
          float: right;
          margin-left: 19px;
        }
        .tabs-container .tabs-right > .nav-tabs > li > a {
          margin-left: -1px;
          -webkit-border-radius: 0 4px 4px 0;
          -moz-border-radius: 0 4px 4px 0;
          border-radius: 0 4px 4px 0;
        }
        .tabs-container .tabs-right > .nav-tabs .active > a,
        .tabs-container .tabs-right > .nav-tabs .active > a:hover,
        .tabs-container .tabs-right > .nav-tabs .active > a:focus {
          border-color: #e7eaec #e7eaec #e7eaec transparent;
          *border-left-color: #ffffff;
          z-index: 1;
        }
        @media (max-width: 767px) {
          .tabs-container .nav-tabs > li {
            float: none !important;
          }
          .tabs-container .nav-tabs > li.active > a {
            border-bottom: 1px solid #e7eaec !important;
            margin: 0;
          }
        }
        /* jsvectormap */
        .jvectormap-container {
          width: 100%;
          height: 100%;
          position: relative;
          overflow: hidden;
        }
        .jvectormap-tip {
          position: absolute;
          display: none;
          border: solid 1px #CDCDCD;
          border-radius: 3px;
          background: #292929;
          color: white;
          font-family: sans-serif, Verdana;
          font-size: smaller;
          padding: 5px;
        }
        .jvectormap-zoomin,
        .jvectormap-zoomout,
        .jvectormap-goback {
          position: absolute;
          left: 10px;
          border-radius: 3px;
          background: #1ab394;
          padding: 3px;
          color: white;
          cursor: pointer;
          line-height: 10px;
          text-align: center;
          box-sizing: content-box;
        }
        .jvectormap-zoomin,
        .jvectormap-zoomout {
          width: 10px;
          height: 10px;
        }
        .jvectormap-zoomin {
          top: 10px;
        }
        .jvectormap-zoomout {
          top: 30px;
        }
        .jvectormap-goback {
          bottom: 10px;
          z-index: 1000;
          padding: 6px;
        }
        .jvectormap-spinner {
          position: absolute;
          left: 0;
          top: 0;
          right: 0;
          bottom: 0;
          background: center no-repeat url(data:image/gif;base64,R0lGODlhIAAgAPMAAP///wAAAMbGxoSEhLa2tpqamjY2NlZWVtjY2OTk5Ly8vB4eHgQEBAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAIAAgAAAE5xDISWlhperN52JLhSSdRgwVo1ICQZRUsiwHpTJT4iowNS8vyW2icCF6k8HMMBkCEDskxTBDAZwuAkkqIfxIQyhBQBFvAQSDITM5VDW6XNE4KagNh6Bgwe60smQUB3d4Rz1ZBApnFASDd0hihh12BkE9kjAJVlycXIg7CQIFA6SlnJ87paqbSKiKoqusnbMdmDC2tXQlkUhziYtyWTxIfy6BE8WJt5YJvpJivxNaGmLHT0VnOgSYf0dZXS7APdpB309RnHOG5gDqXGLDaC457D1zZ/V/nmOM82XiHRLYKhKP1oZmADdEAAAh+QQJCgAAACwAAAAAIAAgAAAE6hDISWlZpOrNp1lGNRSdRpDUolIGw5RUYhhHukqFu8DsrEyqnWThGvAmhVlteBvojpTDDBUEIFwMFBRAmBkSgOrBFZogCASwBDEY/CZSg7GSE0gSCjQBMVG023xWBhklAnoEdhQEfyNqMIcKjhRsjEdnezB+A4k8gTwJhFuiW4dokXiloUepBAp5qaKpp6+Ho7aWW54wl7obvEe0kRuoplCGepwSx2jJvqHEmGt6whJpGpfJCHmOoNHKaHx61WiSR92E4lbFoq+B6QDtuetcaBPnW6+O7wDHpIiK9SaVK5GgV543tzjgGcghAgAh+QQJCgAAACwAAAAAIAAgAAAE7hDISSkxpOrN5zFHNWRdhSiVoVLHspRUMoyUakyEe8PTPCATW9A14E0UvuAKMNAZKYUZCiBMuBakSQKG8G2FzUWox2AUtAQFcBKlVQoLgQReZhQlCIJesQXI5B0CBnUMOxMCenoCfTCEWBsJColTMANldx15BGs8B5wlCZ9Po6OJkwmRpnqkqnuSrayqfKmqpLajoiW5HJq7FL1Gr2mMMcKUMIiJgIemy7xZtJsTmsM4xHiKv5KMCXqfyUCJEonXPN2rAOIAmsfB3uPoAK++G+w48edZPK+M6hLJpQg484enXIdQFSS1u6UhksENEQAAIfkECQoAAAAsAAAAACAAIAAABOcQyEmpGKLqzWcZRVUQnZYg1aBSh2GUVEIQ2aQOE+G+cD4ntpWkZQj1JIiZIogDFFyHI0UxQwFugMSOFIPJftfVAEoZLBbcLEFhlQiqGp1Vd140AUklUN3eCA51C1EWMzMCezCBBmkxVIVHBWd3HHl9JQOIJSdSnJ0TDKChCwUJjoWMPaGqDKannasMo6WnM562R5YluZRwur0wpgqZE7NKUm+FNRPIhjBJxKZteWuIBMN4zRMIVIhffcgojwCF117i4nlLnY5ztRLsnOk+aV+oJY7V7m76PdkS4trKcdg0Zc0tTcKkRAAAIfkECQoAAAAsAAAAACAAIAAABO4QyEkpKqjqzScpRaVkXZWQEximw1BSCUEIlDohrft6cpKCk5xid5MNJTaAIkekKGQkWyKHkvhKsR7ARmitkAYDYRIbUQRQjWBwJRzChi9CRlBcY1UN4g0/VNB0AlcvcAYHRyZPdEQFYV8ccwR5HWxEJ02YmRMLnJ1xCYp0Y5idpQuhopmmC2KgojKasUQDk5BNAwwMOh2RtRq5uQuPZKGIJQIGwAwGf6I0JXMpC8C7kXWDBINFMxS4DKMAWVWAGYsAdNqW5uaRxkSKJOZKaU3tPOBZ4DuK2LATgJhkPJMgTwKCdFjyPHEnKxFCDhEAACH5BAkKAAAALAAAAAAgACAAAATzEMhJaVKp6s2nIkolIJ2WkBShpkVRWqqQrhLSEu9MZJKK9y1ZrqYK9WiClmvoUaF8gIQSNeF1Er4MNFn4SRSDARWroAIETg1iVwuHjYB1kYc1mwruwXKC9gmsJXliGxc+XiUCby9ydh1sOSdMkpMTBpaXBzsfhoc5l58Gm5yToAaZhaOUqjkDgCWNHAULCwOLaTmzswadEqggQwgHuQsHIoZCHQMMQgQGubVEcxOPFAcMDAYUA85eWARmfSRQCdcMe0zeP1AAygwLlJtPNAAL19DARdPzBOWSm1brJBi45soRAWQAAkrQIykShQ9wVhHCwCQCACH5BAkKAAAALAAAAAAgACAAAATrEMhJaVKp6s2nIkqFZF2VIBWhUsJaTokqUCoBq+E71SRQeyqUToLA7VxF0JDyIQh/MVVPMt1ECZlfcjZJ9mIKoaTl1MRIl5o4CUKXOwmyrCInCKqcWtvadL2SYhyASyNDJ0uIiRMDjI0Fd30/iI2UA5GSS5UDj2l6NoqgOgN4gksEBgYFf0FDqKgHnyZ9OX8HrgYHdHpcHQULXAS2qKpENRg7eAMLC7kTBaixUYFkKAzWAAnLC7FLVxLWDBLKCwaKTULgEwbLA4hJtOkSBNqITT3xEgfLpBtzE/jiuL04RGEBgwWhShRgQExHBAAh+QQJCgAAACwAAAAAIAAgAAAE7xDISWlSqerNpyJKhWRdlSAVoVLCWk6JKlAqAavhO9UkUHsqlE6CwO1cRdCQ8iEIfzFVTzLdRAmZX3I2SfZiCqGk5dTESJeaOAlClzsJsqwiJwiqnFrb2nS9kmIcgEsjQydLiIlHehhpejaIjzh9eomSjZR+ipslWIRLAgMDOR2DOqKogTB9pCUJBagDBXR6XB0EBkIIsaRsGGMMAxoDBgYHTKJiUYEGDAzHC9EACcUGkIgFzgwZ0QsSBcXHiQvOwgDdEwfFs0sDzt4S6BK4xYjkDOzn0unFeBzOBijIm1Dgmg5YFQwsCMjp1oJ8LyIAACH5BAkKAAAALAAAAAAgACAAAATwEMhJaVKp6s2nIkqFZF2VIBWhUsJaTokqUCoBq+E71SRQeyqUToLA7VxF0JDyIQh/MVVPMt1ECZlfcjZJ9mIKoaTl1MRIl5o4CUKXOwmyrCInCKqcWtvadL2SYhyASyNDJ0uIiUd6GGl6NoiPOH16iZKNlH6KmyWFOggHhEEvAwwMA0N9GBsEC6amhnVcEwavDAazGwIDaH1ipaYLBUTCGgQDA8NdHz0FpqgTBwsLqAbWAAnIA4FWKdMLGdYGEgraigbT0OITBcg5QwPT4xLrROZL6AuQAPUS7bxLpoWidY0JtxLHKhwwMJBTHgPKdEQAACH5BAkKAAAALAAAAAAgACAAAATrEMhJaVKp6s2nIkqFZF2VIBWhUsJaTokqUCoBq+E71SRQeyqUToLA7VxF0JDyIQh/MVVPMt1ECZlfcjZJ9mIKoaTl1MRIl5o4CUKXOwmyrCInCKqcWtvadL2SYhyASyNDJ0uIiUd6GAULDJCRiXo1CpGXDJOUjY+Yip9DhToJA4RBLwMLCwVDfRgbBAaqqoZ1XBMHswsHtxtFaH1iqaoGNgAIxRpbFAgfPQSqpbgGBqUD1wBXeCYp1AYZ19JJOYgH1KwA4UBvQwXUBxPqVD9L3sbp2BNk2xvvFPJd+MFCN6HAAIKgNggY0KtEBAAh+QQJCgAAACwAAAAAIAAgAAAE6BDISWlSqerNpyJKhWRdlSAVoVLCWk6JKlAqAavhO9UkUHsqlE6CwO1cRdCQ8iEIfzFVTzLdRAmZX3I2SfYIDMaAFdTESJeaEDAIMxYFqrOUaNW4E4ObYcCXaiBVEgULe0NJaxxtYksjh2NLkZISgDgJhHthkpU4mW6blRiYmZOlh4JWkDqILwUGBnE6TYEbCgevr0N1gH4At7gHiRpFaLNrrq8HNgAJA70AWxQIH1+vsYMDAzZQPC9VCNkDWUhGkuE5PxJNwiUK4UfLzOlD4WvzAHaoG9nxPi5d+jYUqfAhhykOFwJWiAAAIfkECQoAAAAsAAAAACAAIAAABPAQyElpUqnqzaciSoVkXVUMFaFSwlpOCcMYlErAavhOMnNLNo8KsZsMZItJEIDIFSkLGQoQTNhIsFehRww2CQLKF0tYGKYSg+ygsZIuNqJksKgbfgIGepNo2cIUB3V1B3IvNiBYNQaDSTtfhhx0CwVPI0UJe0+bm4g5VgcGoqOcnjmjqDSdnhgEoamcsZuXO1aWQy8KAwOAuTYYGwi7w5h+Kr0SJ8MFihpNbx+4Erq7BYBuzsdiH1jCAzoSfl0rVirNbRXlBBlLX+BP0XJLAPGzTkAuAOqb0WT5AH7OcdCm5B8TgRwSRKIHQtaLCwg1RAAAOwAAAAAAAAAAAA==);
        }
        .jvectormap-legend-title {
          font-weight: bold;
          font-size: 14px;
          text-align: center;
        }
        .jvectormap-legend-cnt {
          position: absolute;
        }
        .jvectormap-legend-cnt-h {
          bottom: 0;
          right: 0;
        }
        .jvectormap-legend-cnt-v {
          top: 0;
          right: 0;
        }
        .jvectormap-legend {
          background: black;
          color: white;
          border-radius: 3px;
        }
        .jvectormap-legend-cnt-h .jvectormap-legend {
          float: left;
          margin: 0 10px 10px 0;
          padding: 3px 3px 1px 3px;
        }
        .jvectormap-legend-cnt-h .jvectormap-legend .jvectormap-legend-tick {
          float: left;
        }
        .jvectormap-legend-cnt-v .jvectormap-legend {
          margin: 10px 10px 0 0;
          padding: 3px;
        }
        .jvectormap-legend-cnt-h .jvectormap-legend-tick {
          width: 40px;
        }
        .jvectormap-legend-cnt-h .jvectormap-legend-tick-sample {
          height: 15px;
        }
        .jvectormap-legend-cnt-v .jvectormap-legend-tick-sample {
          height: 20px;
          width: 20px;
          display: inline-block;
          vertical-align: middle;
        }
        .jvectormap-legend-tick-text {
          font-size: 12px;
        }
        .jvectormap-legend-cnt-h .jvectormap-legend-tick-text {
          text-align: center;
        }
        .jvectormap-legend-cnt-v .jvectormap-legend-tick-text {
          display: inline-block;
          vertical-align: middle;
          line-height: 20px;
          padding-left: 3px;
        }
        /*Slick Carousel */
        .slick-prev:before,
        .slick-next:before {
          color: #1ab394 !important;
        }
        /* Payments */
        .payment-card {
          background: #ffffff;
          padding: 20px;
          margin-bottom: 25px;
          border: 1px solid #e7eaec;
        }
        .payment-icon-big {
          font-size: 60px;
          color: #d1dade;
        }
        .payments-method.panel-group .panel + .panel {
          margin-top: -1px;
        }
        .payments-method .panel-heading {
          padding: 15px;
        }
        .payments-method .panel {
          border-radius: 0;
        }
        .payments-method .panel-heading h5 {
          margin-bottom: 5px;
        }
        .payments-method .panel-heading i {
          font-size: 26px;
        }
        /* Select2 custom styles */
        .select2-container--default .select2-selection--single,
        .select2-container--default .select2-selection--multiple {
          border-color: #e7eaec;
        }
        /* Tour */
        .tour-tour .btn.btn-default {
          background-color: #ffffff;
          border: 1px solid #d2d2d2;
          color: inherit;
        }
        .tour-step-backdrop {
          z-index: 2101;
        }
        .tour-backdrop {
          z-index: 2100;
          opacity: .7;
        }
        .popover[class*=tour-] {
          z-index: 2100;
        }
        body.tour-open .animated {
          animation-fill-mode: initial;
        }
        /* Resizable */
        .resizable-panels .ibox {
          clear: none;
          margin: 10px;
          float: left;
          overflow: hidden;
          min-height: 150px;
          min-width: 150px;
        }
        .resizable-panels .ibox .ibox-content {
          height: calc(100% - 49px);
        }
        .ui-resizable-helper {
          background: rgba(211, 211, 211, 0.4);
        }
        /* Wizard step fix */
        .wizard > .content > .body {
          position: relative;
        }
        /* PDF js style */
        .pdf-toolbar {
          max-width: 600px;
          margin: 0 auto;
        }
        /* Dropzone */
        .dropzone {
          min-height: 140px;
          border: 1px dashed #1ab394;
          background: white;
          padding: 20px 20px;
        }
        .dropzone .dz-message {
          font-size: 16px;
        }
        .sidebard-panel {
          width: 220px;
          background: #ebebed;
          padding: 10px 20px;
          position: absolute;
          right: 0;
        }
        .sidebard-panel .feed-element img.img-circle {
          width: 32px;
          height: 32px;
        }
        .sidebard-panel .feed-element,
        .media-body,
        .sidebard-panel p {
          font-size: 12px;
        }
        .sidebard-panel .feed-element {
          margin-top: 20px;
          padding-bottom: 0;
        }
        .sidebard-panel .list-group {
          margin-bottom: 10px;
        }
        .sidebard-panel .list-group .list-group-item {
          padding: 5px 0;
          font-size: 12px;
          border: 0;
        }
        .sidebar-content .wrapper,
        .wrapper.sidebar-content {
          padding-right: 230px !important;
        }
        .body-small .sidebar-content .wrapper,
        .body-small .wrapper.sidebar-content {
          padding-right: 20px !important;
        }
        #right-sidebar {
          background-color: #fff;
          border-left: 1px solid #e7eaec;
          border-top: 1px solid #e7eaec;
          overflow: hidden;
          position: fixed;
          top: 60px;
          width: 260px !important;
          z-index: 1009;
          bottom: 0;
          right: -260px;
        }
        #right-sidebar.sidebar-open {
          right: 0;
        }
        #right-sidebar.sidebar-open.sidebar-top {
          top: 0;
          border-top: none;
        }
        .sidebar-container ul.nav-tabs {
          border: none;
        }
        .sidebar-container ul.nav-tabs.navs-4 li {
          width: 25%;
        }
        .sidebar-container ul.nav-tabs.navs-3 li {
          width: 33.3333%;
        }
        .sidebar-container ul.nav-tabs.navs-2 li {
          width: 50%;
        }
        .sidebar-container ul.nav-tabs li {
          border: none;
        }
        .sidebar-container ul.nav-tabs li a {
          border: none;
          padding: 12px 10px;
          margin: 0;
          border-radius: 0;
          background: #2f4050;
          color: #fff;
          text-align: center;
          border-right: 1px solid #334556;
        }
        .sidebar-container ul.nav-tabs li.active a {
          border: none;
          background: #f9f9f9;
          color: #676a6c;
          font-weight: bold;
        }
        .sidebar-container .nav-tabs > li.active > a:hover,
        .sidebar-container .nav-tabs > li.active > a:focus {
          border: none;
        }
        .sidebar-container ul.sidebar-list {
          margin: 0;
          padding: 0;
        }
        .sidebar-container ul.sidebar-list li {
          border-bottom: 1px solid #e7eaec;
          padding: 15px 20px;
          list-style: none;
          font-size: 12px;
        }
        .sidebar-container .sidebar-message:nth-child(2n+2) {
          background: #f9f9f9;
        }
        .sidebar-container ul.sidebar-list li a {
          text-decoration: none;
          color: inherit;
        }
        .sidebar-container .sidebar-content {
          padding: 15px 20px;
          font-size: 12px;
        }
        .sidebar-container .sidebar-title {
          background: #f9f9f9;
          padding: 20px;
          border-bottom: 1px solid #e7eaec;
        }
        .sidebar-container .sidebar-title h3 {
          margin-bottom: 3px;
          padding-left: 2px;
        }
        .sidebar-container .tab-content h4 {
          margin-bottom: 5px;
        }
        .sidebar-container .sidebar-message > a > .pull-left {
          margin-right: 10px;
        }
        .sidebar-container .sidebar-message > a {
          text-decoration: none;
          color: inherit;
        }
        .sidebar-container .sidebar-message {
          padding: 15px 20px;
        }
        .sidebar-container .sidebar-message .message-avatar {
          height: 38px;
          width: 38px;
          border-radius: 50%;
        }
        .sidebar-container .setings-item {
          padding: 15px 20px;
          border-bottom: 1px solid #e7eaec;
        }
        body {
          font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
          background-color: #2f4050;
          font-size: 13px;
          color: #676a6c;
          overflow-x: hidden;
        }
        html,
        body {
          height: 100%;
        }
        body.full-height-layout #wrapper,
        body.full-height-layout #page-wrapper {
          height: 100%;
        }
        #page-wrapper {
          min-height: auto;
        }
        body.boxed-layout {
          background: url('patterns/shattered.png');
        }
        body.boxed-layout #wrapper {
          background-color: #2f4050;
          max-width: 1200px;
          margin: 0 auto;
          -webkit-box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.75);
          -moz-box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.75);
          box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.75);
        }
        .top-navigation.boxed-layout #wrapper,
        .boxed-layout #wrapper.top-navigation {
          max-width: 1300px !important;
        }
        .block {
          display: block;
        }
        .clear {
          display: block;
          overflow: hidden;
        }
        a {
          cursor: pointer;
        }
        a:hover,
        a:focus {
          text-decoration: none;
        }
        .border-bottom {
          border-bottom: 1px solid #e7eaec !important;
        }
        .font-bold {
          font-weight: 600;
        }
        .font-noraml {
          font-weight: 400;
        }
        .text-uppercase {
          text-transform: uppercase;
        }
        .font-italic {
          font-style: italic;
        }
        .b-r {
          border-right: 1px solid #e7eaec;
        }
        .hr-line-dashed {
          border-top: 1px dashed #e7eaec;
          color: #ffffff;
          background-color: #ffffff;
          height: 1px;
          margin: 20px 0;
        }
        .hr-line-solid {
          border-bottom: 1px solid #e7eaec;
          background-color: rgba(0, 0, 0, 0);
          border-style: solid !important;
          margin-top: 15px;
          margin-bottom: 15px;
        }
        video {
          width: 100% !important;
          height: auto !important;
        }
        /* GALLERY */
        .gallery > .row > div {
          margin-bottom: 15px;
        }
        .fancybox img {
          margin-bottom: 5px;
          /* Only for demo */
          width: 24%;
        }
        /* Summernote text editor  */
        .note-editor {
          height: auto !important;
        }
        .note-editor.fullscreen {
          z-index: 2050;
        }
        .note-editor.note-frame.fullscreen {
          z-index: 2020;
        }
        .note-editor.note-frame {
          border: none;
        }
        .note-editor.panel {
          margin-bottom: 0;
        }
        /* MODAL */
        .modal-content {
          background-clip: padding-box;
          background-color: #FFFFFF;
          border: 1px solid rgba(0, 0, 0, 0);
          border-radius: 4px;
          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
          outline: 0 none;
          position: relative;
        }
        .modal-dialog {
          z-index: 2200;
        }
        .modal-body {
          padding: 20px 30px 30px 30px;
        }
        .inmodal .modal-body {
          background: #f8fafb;
        }
        .inmodal .modal-header {
          padding: 30px 15px;
          text-align: center;
        }
        .animated.modal.fade .modal-dialog {
          -webkit-transform: none;
          -ms-transform: none;
          -o-transform: none;
          transform: none;
        }
        .inmodal .modal-title {
          font-size: 26px;
        }
        .inmodal .modal-icon {
          font-size: 84px;
          color: #e2e3e3;
        }
        .modal-footer {
          margin-top: 0;
        }
        /* WRAPPERS */
        #wrapper {
          width: 100%;
          overflow-x: hidden;
        }
        .wrapper {
          padding: 0 20px;
        }
        .wrapper-content {
          padding: 20px 10px 40px;
        }
        #page-wrapper {
          padding: 0 15px;
          min-height: 568px;
          position: relative !important;
        }
        @media (min-width: 768px) {
          #page-wrapper {
            position: inherit;
            margin: 0 0 0 240px;
            min-height: 2002px;
          }
        }
        .title-action {
          text-align: right;
          padding-top: 30px;
        }
        .ibox-content h1,
        .ibox-content h2,
        .ibox-content h3,
        .ibox-content h4,
        .ibox-content h5,
        .ibox-title h1,
        .ibox-title h2,
        .ibox-title h3,
        .ibox-title h4,
        .ibox-title h5 {
          margin-top: 5px;
        }
        ul.unstyled,
        ol.unstyled {
          list-style: none outside none;
          margin-left: 0;
        }
        .big-icon {
          font-size: 160px !important;
          color: #e5e6e7;
        }
        /* FOOTER */
        .footer {
          background: none repeat scroll 0 0 white;
          border-top: 1px solid #e7eaec;
          bottom: 0;
          left: 0;
          padding: 10px 20px;
          position: absolute;
          right: 0;
        }
        .footer.fixed_full {
          position: fixed;
          bottom: 0;
          left: 0;
          right: 0;
          z-index: 1000;
          padding: 10px 20px;
          background: white;
          border-top: 1px solid #e7eaec;
        }
        .footer.fixed {
          position: fixed;
          bottom: 0;
          left: 0;
          right: 0;
          z-index: 1000;
          padding: 10px 20px;
          background: white;
          border-top: 1px solid #e7eaec;
          margin-left: 220px;
        }
        body.mini-navbar .footer.fixed,
        body.body-small.mini-navbar .footer.fixed {
          margin: 0 0 0 70px;
        }
        body.mini-navbar.canvas-menu .footer.fixed,
        body.canvas-menu .footer.fixed {
          margin: 0 !important;
        }
        body.fixed-sidebar.body-small.mini-navbar .footer.fixed {
          margin: 0 0 0 220px;
        }
        body.body-small .footer.fixed {
          margin-left: 0;
        }
        /* PANELS */
        .page-heading {
          border-top: 0;
          padding: 0 10px 20px 10px;
        }
        .panel-heading h1,
        .panel-heading h2 {
          margin-bottom: 5px;
        }
        /* TABLES */
        .table-bordered {
          border: 1px solid #EBEBEB;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > thead > tr > td {
          background-color: #F5F5F6;
          border-bottom-width: 1px;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td,
        .table-bordered > tfoot > tr > td {
          border: 1px solid #e7e7e7;
        }
        .table > thead > tr > th {
          border-bottom: 1px solid #DDDDDD;
          vertical-align: bottom;
        }
        .table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
          border-top: 1px solid #e7eaec;
          line-height: 1.42857;
          padding: 8px;
          vertical-align: top;
        }
        /* PANELS */
        .panel.blank-panel {
          background: none;
          margin: 0;
        }
        .blank-panel .panel-heading {
          padding-bottom: 0;
        }
        .nav-tabs > li > a {
          color: #A7B1C2;
          font-weight: 600;
          padding: 10px 20px 10px 25px;
        }
        .nav-tabs > li > a:hover,
        .nav-tabs > li > a:focus {
          background-color: #e6e6e6;
          color: #676a6c;
        }
        .ui-tab .tab-content {
          padding: 20px 0;
        }
        /* GLOBAL  */
        .no-padding {
          padding: 0 !important;
        }
        .no-borders {
          border: none !important;
        }
        .no-margins {
          margin: 0 !important;
        }
        .no-top-border {
          border-top: 0 !important;
        }
        .ibox-content.text-box {
          padding-bottom: 0;
          padding-top: 15px;
        }
        .border-left-right {
          border-left: 1px solid #e7eaec;
          border-right: 1px solid #e7eaec;
        }
        .border-top-bottom {
          border-top: 1px solid #e7eaec;
          border-bottom: 1px solid #e7eaec;
        }
        .border-left {
          border-left: 1px solid #e7eaec;
        }
        .border-right {
          border-right: 1px solid #e7eaec;
        }
        .border-top {
          border-top: 1px solid #e7eaec;
        }
        .border-bottom {
          border-bottom: 1px solid #e7eaec;
        }
        .border-size-sm {
          border-width: 3px;
        }
        .border-size-md {
          border-width: 6px;
        }
        .border-size-lg {
          border-width: 9px;
        }
        .border-size-xl {
          border-width: 12px;
        }
        .full-width {
          width: 100% !important;
        }
        .link-block {
          font-size: 12px;
          padding: 10px;
        }
        .nav.navbar-top-links .link-block a {
          font-size: 12px;
        }
        .link-block a {
          font-size: 10px;
          color: inherit;
        }
        body.mini-navbar .branding {
          display: none;
        }
        img.circle-border {
          border: 6px solid #FFFFFF;
          border-radius: 50%;
        }
        .branding {
          float: left;
          color: #FFFFFF;
          font-size: 18px;
          font-weight: 600;
          padding: 17px 20px;
          text-align: center;
          background-color: #1ab394;
        }
        .login-panel {
          margin-top: 25%;
        }
        .icons-box h3 {
          margin-top: 10px;
          margin-bottom: 10px;
        }
        .icons-box .infont a i {
          font-size: 25px;
          display: block;
          color: #676a6c;
        }
        .icons-box .infont a {
          color: #a6a8a9;
        }
        .icons-box .infont a {
          padding: 10px;
          margin: 1px;
          display: block;
        }
        .ui-draggable .ibox-title {
          cursor: move;
        }
        .breadcrumb {
          background-color: #ffffff;
          padding: 0;
          margin-bottom: 0;
        }
        .breadcrumb > li a {
          color: inherit;
        }
        .breadcrumb > .active {
          color: inherit;
        }
        code {
          background-color: #F9F2F4;
          border-radius: 4px;
          color: #ca4440;
          font-size: 90%;
          padding: 2px 4px;
          white-space: nowrap;
        }
        .ibox {
          clear: both;
          margin-bottom: 25px;
          margin-top: 0;
          padding: 0;
        }
        .ibox.collapsed .ibox-content {
          display: none;
        }
        .ibox.collapsed .fa.fa-chevron-up:before {
          content: "\f078";
        }
        .ibox.collapsed .fa.fa-chevron-down:before {
          content: "\f077";
        }
        .ibox:after,
        .ibox:before {
          display: table;
        }
        .ibox-title {
          -moz-border-bottom-colors: none;
          -moz-border-left-colors: none;
          -moz-border-right-colors: none;
          -moz-border-top-colors: none;
          background-color: #ffffff;
          border-color: #e7eaec;
          border-image: none;
          border-style: solid solid none;
          border-width: 2px 0 0;
          color: inherit;
          margin-bottom: 0;
          padding: 15px 15px 7px;
          min-height: 48px;
        }
        .ibox-content {
          background-color: #ffffff;
          color: inherit;
          padding: 15px 20px 20px 20px;
          border-color: #e7eaec;
          border-image: none;
          border-style: solid solid none;
          border-width: 1px 0;
        }
        .ibox-footer {
          color: inherit;
          border-top: 1px solid #e7eaec;
          font-size: 90%;
          background: #ffffff;
          padding: 10px 15px;
        }
        table.table-mail tr td {
          padding: 12px;
        }
        .table-mail .check-mail {
          padding-left: 20px;
        }
        .table-mail .mail-date {
          padding-right: 20px;
        }
        .star-mail,
        .check-mail {
          width: 40px;
        }
        .unread td a,
        .unread td {
          font-weight: 600;
          color: inherit;
        }
        .read td a,
        .read td {
          font-weight: normal;
          color: inherit;
        }
        .unread td {
          background-color: #f9f8f8;
        }
        .ibox-content {
          clear: both;
        }
        .ibox-heading {
          background-color: #f3f6fb;
          border-bottom: none;
        }
        .ibox-heading h3 {
          font-weight: 200;
          font-size: 24px;
        }
        .ibox-title h5 {
          display: inline-block;
          font-size: 14px;
          margin: 0 0 7px;
          padding: 0;
          text-overflow: ellipsis;
          float: left;
        }
        .ibox-title .label {
          float: left;
          margin-left: 4px;
        }
        .ibox-tools {
          display: block;
          float: none;
          margin-top: 0;
          position: relative;
          padding: 0;
          text-align: right;
        }
        .ibox-tools a {
          cursor: pointer;
          margin-left: 5px;
          color: #c4c4c4;
        }
        .ibox-tools a.btn-primary {
          color: #fff;
        }
        .ibox-tools .dropdown-menu > li > a {
          padding: 4px 10px;
          font-size: 12px;
        }
        .ibox .ibox-tools.open > .dropdown-menu {
          left: auto;
          right: 0;
        }
        /* BACKGROUNDS */
        .gray-bg,
        .bg-muted {
          background-color: #f3f3f4;
        }
        .white-bg {
          background-color: #ffffff;
        }
        .navy-bg,
        .bg-success {
          background-color: #1ab394;
          color: #ffffff;
        }
        .blue-bg,
        .bg-primary {
          background-color: #1c84c6;
          color: #ffffff;
        }
        .lazur-bg,
        .bg-info {
          background-color: #23c6c8;
          color: #ffffff;
        }
        .yellow-bg,
        .bg-warning {
          background-color: #f8ac59;
          color: #ffffff;
        }
        .red-bg,
        .bg-danger {
          background-color: #ed5565;
          color: #ffffff;
        }
        .black-bg {
          background-color: #262626;
        }
        .panel-primary {
          border-color: #1ab394;
        }
        .panel-primary > .panel-heading {
          background-color: #1ab394;
          border-color: #1ab394;
        }
        .panel-success {
          border-color: #1c84c6;
        }
        .panel-success > .panel-heading {
          background-color: #1c84c6;
          border-color: #1c84c6;
          color: #ffffff;
        }
        .panel-info {
          border-color: #23c6c8;
        }
        .panel-info > .panel-heading {
          background-color: #23c6c8;
          border-color: #23c6c8;
          color: #ffffff;
        }
        .panel-warning {
          border-color: #f8ac59;
        }
        .panel-warning > .panel-heading {
          background-color: #f8ac59;
          border-color: #f8ac59;
          color: #ffffff;
        }
        .panel-danger {
          border-color: #ed5565;
        }
        .panel-danger > .panel-heading {
          background-color: #ed5565;
          border-color: #ed5565;
          color: #ffffff;
        }
        .progress-bar {
          background-color: #1ab394;
        }
        .progress-small,
        .progress-small .progress-bar {
          height: 10px;
        }
        .progress-small,
        .progress-mini {
          margin-top: 5px;
        }
        .progress-mini,
        .progress-mini .progress-bar {
          height: 5px;
          margin-bottom: 0;
        }
        .progress-bar-navy-light {
          background-color: #3dc7ab;
        }
        .progress-bar-success {
          background-color: #1c84c6;
        }
        .progress-bar-info {
          background-color: #23c6c8;
        }
        .progress-bar-warning {
          background-color: #f8ac59;
        }
        .progress-bar-danger {
          background-color: #ed5565;
        }
        .panel-title {
          font-size: inherit;
        }
        .jumbotron {
          border-radius: 6px;
          padding: 40px;
        }
        .jumbotron h1 {
          margin-top: 0;
        }
        /* COLORS */
        .text-navy {
          color: #1ab394;
        }
        .text-primary {
          color: inherit;
        }
        .text-success {
          color: #1c84c6;
        }
        .text-info {
          color: #23c6c8;
        }
        .text-warning {
          color: #f8ac59;
        }
        .text-danger {
          color: #ed5565;
        }
        .text-muted {
          color: #888888;
        }
        .text-white {
          color: #ffffff;
        }
        .simple_tag {
          background-color: #f3f3f4;
          border: 1px solid #e7eaec;
          border-radius: 2px;
          color: inherit;
          font-size: 10px;
          margin-right: 5px;
          margin-top: 5px;
          padding: 5px 12px;
          display: inline-block;
        }
        .img-shadow {
          -webkit-box-shadow: 0 0 3px 0 #919191;
          -moz-box-shadow: 0 0 3px 0 #919191;
          box-shadow: 0 0 3px 0 #919191;
        }
        /* For handle diferent bg color in AngularJS version */
        .dashboards\.dashboard_2 nav.navbar,
        .dashboards\.dashboard_3 nav.navbar,
        .mailbox\.inbox nav.navbar,
        .mailbox\.email_view nav.navbar,
        .mailbox\.email_compose nav.navbar,
        .dashboards\.dashboard_4_1 nav.navbar,
        .metrics nav.navbar,
        .metrics\.index nav.navbar,
        .dashboards\.dashboard_5 nav.navbar {
          background: #fff;
        }
        /* For handle diferent bg color in MVC version */
        .Dashboard_2 .navbar.navbar-static-top,
        .Dashboard_3 .navbar.navbar-static-top,
        .Dashboard_4_1 .navbar.navbar-static-top,
        .ComposeEmail .navbar.navbar-static-top,
        .EmailView .navbar.navbar-static-top,
        .Inbox .navbar.navbar-static-top,
        .Metrics .navbar.navbar-static-top,
        .Dashboard_5 .navbar.navbar-static-top {
          background: #fff;
        }
        a.close-canvas-menu {
          position: absolute;
          top: 10px;
          right: 15px;
          z-index: 1011;
          color: #a7b1c2;
        }
        a.close-canvas-menu:hover {
          color: #fff;
        }
        .close-canvas-menu {
          display: none;
        }
        .canvas-menu .close-canvas-menu {
          display: block;
        }
        .light-navbar .navbar.navbar-static-top {
          background-color: #ffffff;
        }
        /* FULL HEIGHT */
        .full-height {
          height: 100%;
        }
        .fh-breadcrumb {
          height: calc(100% - 196px);
          margin: 0 -15px;
          position: relative;
        }
        .fh-no-breadcrumb {
          height: calc(100% - 99px);
          margin: 0 -15px;
          position: relative;
        }
        .fh-column {
          background: #fff;
          height: 100%;
          width: 240px;
          float: left;
        }
        .modal-backdrop {
          z-index: 2040 !important;
        }
        .modal {
          z-index: 2050 !important;
        }
        .spiner-example {
          height: 200px;
          padding-top: 70px;
        }
        /* MARGINS & PADDINGS */
        .p-xxs {
          padding: 5px;
        }
        .p-xs {
          padding: 10px;
        }
        .p-sm {
          padding: 15px;
        }
        .p-m {
          padding: 20px;
        }
        .p-md {
          padding: 25px;
        }
        .p-lg {
          padding: 30px;
        }
        .p-xl {
          padding: 40px;
        }
        .p-w-xs {
          padding: 0 10px;
        }
        .p-w-sm {
          padding: 0 15px;
        }
        .p-w-m {
          padding: 0 20px;
        }
        .p-w-md {
          padding: 0 25px;
        }
        .p-w-lg {
          padding: 0 30px;
        }
        .p-w-xl {
          padding: 0 40px;
        }
        .p-h-xs {
          padding: 10px 0;
        }
        .p-h-sm {
          padding: 15px 0;
        }
        .p-h-m {
          padding: 20px 0;
        }
        .p-h-md {
          padding: 25px 0;
        }
        .p-h-lg {
          padding: 30px 0;
        }
        .p-h-xl {
          padding: 40px 0;
        }
        .m-xxs {
          margin: 2px 4px;
        }
        .m-xs {
          margin: 5px;
        }
        .m-sm {
          margin: 10px;
        }
        .m-md {
          margin: 20px;
        }
        .m-lg {
          margin: 30px;
        }
        .m-xl {
          margin: 50px;
        }
        .m-n {
          margin: 0 !important;
        }
        .m-l-none {
          margin-left: 0;
        }
        .m-l-xs {
          margin-left: 5px;
        }
        .m-l-sm {
          margin-left: 10px;
        }
        .m-l {
          margin-left: 15px;
        }
        .m-l-md {
          margin-left: 20px;
        }
        .m-l-lg {
          margin-left: 30px;
        }
        .m-l-xl {
          margin-left: 40px;
        }
        .m-l-n-xxs {
          margin-left: -1px;
        }
        .m-l-n-xs {
          margin-left: -5px;
        }
        .m-l-n-sm {
          margin-left: -10px;
        }
        .m-l-n {
          margin-left: -15px;
        }
        .m-l-n-md {
          margin-left: -20px;
        }
        .m-l-n-lg {
          margin-left: -30px;
        }
        .m-l-n-xl {
          margin-left: -40px;
        }
        .m-t-none {
          margin-top: 0;
        }
        .m-t-xxs {
          margin-top: 1px;
        }
        .m-t-xs {
          margin-top: 5px;
        }
        .m-t-sm {
          margin-top: 10px;
        }
        .m-t {
          margin-top: 15px;
        }
        .m-t-md {
          margin-top: 20px;
        }
        .m-t-lg {
          margin-top: 30px;
        }
        .m-t-xl {
          margin-top: 40px;
        }
        .m-t-n-xxs {
          margin-top: -1px;
        }
        .m-t-n-xs {
          margin-top: -5px;
        }
        .m-t-n-sm {
          margin-top: -10px;
        }
        .m-t-n {
          margin-top: -15px;
        }
        .m-t-n-md {
          margin-top: -20px;
        }
        .m-t-n-lg {
          margin-top: -30px;
        }
        .m-t-n-xl {
          margin-top: -40px;
        }
        .m-r-none {
          margin-right: 0;
        }
        .m-r-xxs {
          margin-right: 1px;
        }
        .m-r-xs {
          margin-right: 5px;
        }
        .m-r-sm {
          margin-right: 10px;
        }
        .m-r {
          margin-right: 15px;
        }
        .m-r-md {
          margin-right: 20px;
        }
        .m-r-lg {
          margin-right: 30px;
        }
        .m-r-xl {
          margin-right: 40px;
        }
        .m-r-n-xxs {
          margin-right: -1px;
        }
        .m-r-n-xs {
          margin-right: -5px;
        }
        .m-r-n-sm {
          margin-right: -10px;
        }
        .m-r-n {
          margin-right: -15px;
        }
        .m-r-n-md {
          margin-right: -20px;
        }
        .m-r-n-lg {
          margin-right: -30px;
        }
        .m-r-n-xl {
          margin-right: -40px;
        }
        .m-b-none {
          margin-bottom: 0;
        }
        .m-b-xxs {
          margin-bottom: 1px;
        }
        .m-b-xs {
          margin-bottom: 5px;
        }
        .m-b-sm {
          margin-bottom: 10px;
        }
        .m-b {
          margin-bottom: 15px;
        }
        .m-b-md {
          margin-bottom: 20px;
        }
        .m-b-lg {
          margin-bottom: 30px;
        }
        .m-b-xl {
          margin-bottom: 40px;
        }
        .m-b-n-xxs {
          margin-bottom: -1px;
        }
        .m-b-n-xs {
          margin-bottom: -5px;
        }
        .m-b-n-sm {
          margin-bottom: -10px;
        }
        .m-b-n {
          margin-bottom: -15px;
        }
        .m-b-n-md {
          margin-bottom: -20px;
        }
        .m-b-n-lg {
          margin-bottom: -30px;
        }
        .m-b-n-xl {
          margin-bottom: -40px;
        }
        .space-15 {
          margin: 15px 0;
        }
        .space-20 {
          margin: 20px 0;
        }
        .space-25 {
          margin: 25px 0;
        }
        .space-30 {
          margin: 30px 0;
        }
        .img-sm {
          width: 32px;
          height: 32px;
        }
        .img-md {
          width: 64px;
          height: 64px;
        }
        .img-lg {
          width: 96px;
          height: 96px;
        }
        .b-r-xs {
          -webkit-border-radius: 1px;
          -moz-border-radius: 1px;
          border-radius: 1px;
        }
        .b-r-sm {
          -webkit-border-radius: 3px;
          -moz-border-radius: 3px;
          border-radius: 3px;
        }
        .b-r-md {
          -webkit-border-radius: 6px;
          -moz-border-radius: 6px;
          border-radius: 6px;
        }
        .b-r-lg {
          -webkit-border-radius: 12px;
          -moz-border-radius: 12px;
          border-radius: 12px;
        }
        .b-r-xl {
          -webkit-border-radius: 24px;
          -moz-border-radius: 24px;
          border-radius: 24px;
        }
        .fullscreen-ibox-mode .animated {
          animation: none;
        }
        body.fullscreen-ibox-mode {
          overflow-y: hidden;
        }
        .ibox.fullscreen {
          z-index: 2030;
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          overflow: auto;
          margin-bottom: 0;
        }
        .ibox.fullscreen .collapse-link {
          display: none;
        }
        .ibox.fullscreen .ibox-content {
          min-height: calc(100% - 48px);
        }
        body.modal-open {
          padding-right: inherit !important;
        }
        body.modal-open .wrapper-content.animated {
          -webkit-animation: none;
        }
        body.modal-open .animated {
          animation-fill-mode: initial;
          z-index: inherit;
        }
        /* Show profile dropdown on fixed sidebar */
        body.mini-navbar.fixed-sidebar .profile-element,
        .block {
          display: block !important;
        }
        body.mini-navbar.fixed-sidebar .nav-header {
          padding: 33px 25px;
        }
        body.mini-navbar.fixed-sidebar .logo-element {
          display: none;
        }
        .fullscreen-video .animated {
          animation: none;
        }
        /* SEARCH PAGE */
        .search-form {
          margin-top: 10px;
        }
        .search-result h3 {
          margin-bottom: 0;
          color: #1E0FBE;
        }
        .search-result .search-link {
          color: #006621;
        }
        .search-result p {
          font-size: 12px;
          margin-top: 5px;
        }
        /* CONTACTS */
        .contact-box {
          background-color: #ffffff;
          border: 1px solid #e7eaec;
          padding: 20px;
          margin-bottom: 20px;
        }
        .contact-box > a {
          color: inherit;
        }
        .contact-box.center-version {
          border: 1px solid #e7eaec;
          padding: 0;
        }
        .contact-box.center-version > a {
          display: block;
          background-color: #ffffff;
          padding: 20px;
          text-align: center;
        }
        .contact-box.center-version > a img {
          width: 80px;
          height: 80px;
          margin-top: 10px;
          margin-bottom: 10px;
        }
        .contact-box.center-version address {
          margin-bottom: 0;
        }
        .contact-box .contact-box-footer {
          text-align: center;
          background-color: #ffffff;
          border-top: 1px solid #e7eaec;
          padding: 15px 20px;
        }
        /* INVOICE */
        .invoice-table tbody > tr > td:last-child,
        .invoice-table tbody > tr > td:nth-child(4),
        .invoice-table tbody > tr > td:nth-child(3),
        .invoice-table tbody > tr > td:nth-child(2) {
          text-align: right;
        }
        .invoice-table thead > tr > th:last-child,
        .invoice-table thead > tr > th:nth-child(4),
        .invoice-table thead > tr > th:nth-child(3),
        .invoice-table thead > tr > th:nth-child(2) {
          text-align: right;
        }
        .invoice-total > tbody > tr > td:first-child {
          text-align: right;
        }
        .invoice-total > tbody > tr > td {
          border: 0 none;
        }
        .invoice-total > tbody > tr > td:last-child {
          border-bottom: 1px solid #DDDDDD;
          text-align: right;
          width: 15%;
        }
        /* ERROR & LOGIN & LOCKSCREEN*/
        .middle-box {
          max-width: 400px;
          z-index: 100;
          margin: 0 auto;
          padding-top: 40px;
        }
        .lockscreen.middle-box {
          width: 200px;
          padding-top: 110px;
        }
        .loginscreen.middle-box {
          width: 300px;
        }
        .loginColumns {
          max-width: 800px;
          margin: 0 auto;
          padding: 100px 20px 20px 20px;
        }
        .passwordBox {
          max-width: 460px;
          margin: 0 auto;
          padding: 100px 20px 20px 20px;
        }
        .logo-name {
          color: #e6e6e6;
          font-size: 180px;
          font-weight: 800;
          letter-spacing: -10px;
          margin-bottom: 0;
        }
        .middle-box h1 {
          font-size: 170px;
        }
        .wrapper .middle-box {
          margin-top: 140px;
        }
        .lock-word {
          z-index: 10;
          position: absolute;
          top: 110px;
          left: 50%;
          margin-left: -470px;
        }
        .lock-word span {
          font-size: 100px;
          font-weight: 600;
          color: #e9e9e9;
          display: inline-block;
        }
        .lock-word .first-word {
          margin-right: 160px;
        }
        /* DASBOARD */
        .dashboard-header {
          border-top: 0;
          padding: 20px 20px 20px 20px;
        }
        .dashboard-header h2 {
          margin-top: 10px;
          font-size: 26px;
        }
        .fist-item {
          border-top: none !important;
        }
        .statistic-box {
          margin-top: 40px;
        }
        .dashboard-header .list-group-item span.label {
          margin-right: 10px;
        }
        .list-group.clear-list .list-group-item {
          border-top: 1px solid #e7eaec;
          border-bottom: 0;
          border-right: 0;
          border-left: 0;
          padding: 10px 0;
        }
        ul.clear-list:first-child {
          border-top: none !important;
        }
        /* Intimeline */
        .timeline-item .date i {
          position: absolute;
          top: 0;
          right: 0;
          padding: 5px;
          width: 30px;
          text-align: center;
          border-top: 1px solid #e7eaec;
          border-bottom: 1px solid #e7eaec;
          border-left: 1px solid #e7eaec;
          background: #f8f8f8;
        }
        .timeline-item .date {
          text-align: right;
          width: 110px;
          position: relative;
          padding-top: 30px;
        }
        .timeline-item .content {
          border-left: 1px solid #e7eaec;
          border-top: 1px solid #e7eaec;
          padding-top: 10px;
          min-height: 100px;
        }
        .timeline-item .content:hover {
          background: #f6f6f6;
        }
        /* PIN BOARD */
        ul.notes li,
        ul.tag-list li {
          list-style: none;
        }
        ul.notes li h4 {
          margin-top: 20px;
          font-size: 16px;
        }
        ul.notes li div {
          text-decoration: none;
          color: #000;
          background: #ffc;
          display: block;
          height: 140px;
          width: 140px;
          padding: 1em;
          position: relative;
        }
        ul.notes li div small {
          position: absolute;
          top: 5px;
          right: 5px;
          font-size: 10px;
        }
        ul.notes li div a {
          position: absolute;
          right: 10px;
          bottom: 10px;
          color: inherit;
        }
        ul.notes li {
          margin: 10px 40px 50px 0;
          float: left;
        }
        ul.notes li div p {
          font-size: 12px;
        }
        ul.notes li div {
          text-decoration: none;
          color: #000;
          background: #ffc;
          display: block;
          height: 140px;
          width: 140px;
          padding: 1em;
          /* Firefox */
          -moz-box-shadow: 5px 5px 2px #212121;
          /* Safari+Chrome */
          -webkit-box-shadow: 5px 5px 2px rgba(33, 33, 33, 0.7);
          /* Opera */
          box-shadow: 5px 5px 2px rgba(33, 33, 33, 0.7);
        }
        ul.notes li div {
          -webkit-transform: rotate(-6deg);
          -o-transform: rotate(-6deg);
          -moz-transform: rotate(-6deg);
        }
        ul.notes li:nth-child(even) div {
          -o-transform: rotate(4deg);
          -webkit-transform: rotate(4deg);
          -moz-transform: rotate(4deg);
          position: relative;
          top: 5px;
        }
        ul.notes li:nth-child(3n) div {
          -o-transform: rotate(-3deg);
          -webkit-transform: rotate(-3deg);
          -moz-transform: rotate(-3deg);
          position: relative;
          top: -5px;
        }
        ul.notes li:nth-child(5n) div {
          -o-transform: rotate(5deg);
          -webkit-transform: rotate(5deg);
          -moz-transform: rotate(5deg);
          position: relative;
          top: -10px;
        }
        ul.notes li div:hover,
        ul.notes li div:focus {
          -webkit-transform: scale(1.1);
          -moz-transform: scale(1.1);
          -o-transform: scale(1.1);
          position: relative;
          z-index: 5;
        }
        ul.notes li div {
          text-decoration: none;
          color: #000;
          background: #ffc;
          display: block;
          height: 210px;
          width: 210px;
          padding: 1em;
          -moz-box-shadow: 5px 5px 7px #212121;
          -webkit-box-shadow: 5px 5px 7px rgba(33, 33, 33, 0.7);
          box-shadow: 5px 5px 7px rgba(33, 33, 33, 0.7);
          -moz-transition: -moz-transform 0.15s linear;
          -o-transition: -o-transform 0.15s linear;
          -webkit-transition: -webkit-transform 0.15s linear;
        }
        /* FILE MANAGER */
        .file-box {
          float: left;
          width: 220px;
        }
        .file-manager h5 {
          text-transform: uppercase;
        }
        .file-manager {
          list-style: none outside none;
          margin: 0;
          padding: 0;
        }
        .folder-list li a {
          color: #666666;
          display: block;
          padding: 5px 0;
        }
        .folder-list li {
          border-bottom: 1px solid #e7eaec;
          display: block;
        }
        .folder-list li i {
          margin-right: 8px;
          color: #3d4d5d;
        }
        .category-list li a {
          color: #666666;
          display: block;
          padding: 5px 0;
        }
        .category-list li {
          display: block;
        }
        .category-list li i {
          margin-right: 8px;
          color: #3d4d5d;
        }
        .category-list li a .text-navy {
          color: #1ab394;
        }
        .category-list li a .text-primary {
          color: #1c84c6;
        }
        .category-list li a .text-info {
          color: #23c6c8;
        }
        .category-list li a .text-danger {
          color: #EF5352;
        }
        .category-list li a .text-warning {
          color: #F8AC59;
        }
        .file-manager h5.tag-title {
          margin-top: 20px;
        }
        .tag-list li {
          float: left;
        }
        .tag-list li a {
          font-size: 10px;
          background-color: #f3f3f4;
          padding: 5px 12px;
          color: inherit;
          border-radius: 2px;
          border: 1px solid #e7eaec;
          margin-right: 5px;
          margin-top: 5px;
          display: block;
        }
        .file {
          border: 1px solid #e7eaec;
          padding: 0;
          background-color: #ffffff;
          position: relative;
          margin-bottom: 20px;
          margin-right: 20px;
        }
        .file-manager .hr-line-dashed {
          margin: 15px 0;
        }
        .file .icon,
        .file .image {
          height: 100px;
          overflow: hidden;
        }
        .file .icon {
          padding: 15px 10px;
          text-align: center;
        }
        .file-control {
          color: inherit;
          font-size: 11px;
          margin-right: 10px;
        }
        .file-control.active {
          text-decoration: underline;
        }
        .file .icon i {
          font-size: 70px;
          color: #dadada;
        }
        .file .file-name {
          padding: 10px;
          background-color: #f8f8f8;
          border-top: 1px solid #e7eaec;
        }
        .file-name small {
          color: #676a6c;
        }
        .corner {
          position: absolute;
          display: inline-block;
          width: 0;
          height: 0;
          line-height: 0;
          border: 0.6em solid transparent;
          border-right: 0.6em solid #f1f1f1;
          border-bottom: 0.6em solid #f1f1f1;
          right: 0em;
          bottom: 0em;
        }
        a.compose-mail {
          padding: 8px 10px;
        }
        .mail-search {
          max-width: 300px;
        }
        /* PROFILE */
        .profile-content {
          border-top: none !important;
        }
        .profile-stats {
          margin-right: 10px;
        }
        .profile-image {
          width: 120px;
          float: left;
        }
        .profile-image img {
          width: 96px;
          height: 96px;
        }
        .profile-info {
          margin-left: 120px;
        }
        .feed-activity-list .feed-element {
          border-bottom: 1px solid #e7eaec;
        }
        .feed-element:first-child {
          margin-top: 0;
        }
        .feed-element {
          padding-bottom: 15px;
        }
        .feed-element,
        .feed-element .media {
          margin-top: 15px;
        }
        .feed-element,
        .media-body {
          overflow: hidden;
        }
        .feed-element > .pull-left {
          margin-right: 10px;
        }
        .feed-element img.img-circle,
        .dropdown-messages-box img.img-circle {
          width: 38px;
          height: 38px;
        }
        .feed-element .well {
          border: 1px solid #e7eaec;
          box-shadow: none;
          margin-top: 10px;
          margin-bottom: 5px;
          padding: 10px 20px;
          font-size: 11px;
          line-height: 16px;
        }
        .feed-element .actions {
          margin-top: 10px;
        }
        .feed-element .photos {
          margin: 10px 0;
        }
        .feed-photo {
          max-height: 180px;
          border-radius: 4px;
          overflow: hidden;
          margin-right: 10px;
          margin-bottom: 10px;
        }
        .file-list li {
          padding: 5px 10px;
          font-size: 11px;
          border-radius: 2px;
          border: 1px solid #e7eaec;
          margin-bottom: 5px;
        }
        .file-list li a {
          color: inherit;
        }
        .file-list li a:hover {
          color: #1ab394;
        }
        .user-friends img {
          width: 42px;
          height: 42px;
          margin-bottom: 5px;
          margin-right: 5px;
        }
        /* MAILBOX */
        .mail-box {
          background-color: #ffffff;
          border: 1px solid #e7eaec;
          border-top: 0;
          padding: 0;
          margin-bottom: 20px;
        }
        .mail-box-header {
          background-color: #ffffff;
          border: 1px solid #e7eaec;
          border-bottom: 0;
          padding: 30px 20px 20px 20px;
        }
        .mail-box-header h2 {
          margin-top: 0;
        }
        .mailbox-content .tag-list li a {
          background: #ffffff;
        }
        .mail-body {
          border-top: 1px solid #e7eaec;
          padding: 20px;
        }
        .mail-text {
          border-top: 1px solid #e7eaec;
        }
        .mail-text .note-toolbar {
          padding: 10px 15px;
        }
        .mail-body .form-group {
          margin-bottom: 5px;
        }
        .mail-text .note-editor .note-toolbar {
          background-color: #F9F8F8;
        }
        .mail-attachment {
          border-top: 1px solid #e7eaec;
          padding: 20px;
          font-size: 12px;
        }
        .mailbox-content {
          background: none;
          border: none;
          padding: 10px;
        }
        .mail-ontact {
          width: 23%;
        }
        /* PROJECTS */
        .project-people,
        .project-actions {
          text-align: right;
          vertical-align: middle;
        }
        dd.project-people {
          text-align: left;
          margin-top: 5px;
        }
        .project-people img {
          width: 32px;
          height: 32px;
        }
        .project-title a {
          font-size: 14px;
          color: #676a6c;
          font-weight: 600;
        }
        .project-list table tr td {
          border-top: none;
          border-bottom: 1px solid #e7eaec;
          padding: 15px 10px;
          vertical-align: middle;
        }
        .project-manager .tag-list li a {
          font-size: 10px;
          background-color: white;
          padding: 5px 12px;
          color: inherit;
          border-radius: 2px;
          border: 1px solid #e7eaec;
          margin-right: 5px;
          margin-top: 5px;
          display: block;
        }
        .project-files li a {
          font-size: 11px;
          color: #676a6c;
          margin-left: 10px;
          line-height: 22px;
        }
        /* FAQ */
        .faq-item {
          padding: 20px;
          margin-bottom: 2px;
          background: #fff;
        }
        .faq-question {
          font-size: 18px;
          font-weight: 600;
          color: #1ab394;
          display: block;
        }
        .faq-question:hover {
          color: #179d82;
        }
        .faq-answer {
          margin-top: 10px;
          background: #f3f3f4;
          border: 1px solid #e7eaec;
          border-radius: 3px;
          padding: 15px;
        }
        .faq-item .tag-item {
          background: #f3f3f4;
          padding: 2px 6px;
          font-size: 10px;
          text-transform: uppercase;
        }
        /* Chat view */
        .message-input {
          height: 90px !important;
        }
        .chat-avatar {
          white: 36px;
          height: 36px;
          float: left;
          margin-right: 10px;
        }
        .chat-user-name {
          padding: 10px;
        }
        .chat-user {
          padding: 8px 10px;
          border-bottom: 1px solid #e7eaec;
        }
        .chat-user a {
          color: inherit;
        }
        .chat-view {
          z-index: 20012;
        }
        .chat-users,
        .chat-statistic {
          margin-left: -30px;
        }
        @media (max-width: 992px) {
          .chat-users,
          .chat-statistic {
            margin-left: 0;
          }
        }
        .chat-view .ibox-content {
          padding: 0;
        }
        .chat-message {
          padding: 10px 20px;
        }
        .message-avatar {
          height: 48px;
          width: 48px;
          border: 1px solid #e7eaec;
          border-radius: 4px;
          margin-top: 1px;
        }
        .chat-discussion .chat-message.left .message-avatar {
          float: left;
          margin-right: 10px;
        }
        .chat-discussion .chat-message.right .message-avatar {
          float: right;
          margin-left: 10px;
        }
        .message {
          background-color: #fff;
          border: 1px solid #e7eaec;
          text-align: left;
          display: block;
          padding: 10px 20px;
          position: relative;
          border-radius: 4px;
        }
        .chat-discussion .chat-message.left .message-date {
          float: right;
        }
        .chat-discussion .chat-message.right .message-date {
          float: left;
        }
        .chat-discussion .chat-message.left .message {
          text-align: left;
          margin-left: 55px;
        }
        .chat-discussion .chat-message.right .message {
          text-align: right;
          margin-right: 55px;
        }
        .message-date {
          font-size: 10px;
          color: #888888;
        }
        .message-content {
          display: block;
        }
        .chat-discussion {
          background: #eee;
          padding: 15px;
          height: 400px;
          overflow-y: auto;
        }
        .chat-users {
          overflow-y: auto;
          height: 400px;
        }
        .chat-message-form .form-group {
          margin-bottom: 0;
        }
        /* jsTree */
        .jstree-open > .jstree-anchor > .fa-folder:before {
          content: "\f07c";
        }
        .jstree-default .jstree-icon.none {
          width: 0;
        }
        /* CLIENTS */
        .clients-list {
          margin-top: 20px;
        }
        .clients-list .tab-pane {
          position: relative;
          height: 600px;
        }
        .client-detail {
          position: relative;
          height: 620px;
        }
        .clients-list table tr td {
          height: 46px;
          vertical-align: middle;
          border: none;
        }
        .client-link {
          font-weight: 600;
          color: inherit;
        }
        .client-link:hover {
          color: inherit;
        }
        .client-avatar {
          width: 42px;
        }
        .client-avatar img {
          width: 28px;
          height: 28px;
          border-radius: 50%;
        }
        .contact-type {
          width: 20px;
          color: #c1c3c4;
        }
        .client-status {
          text-align: left;
        }
        .client-detail .vertical-timeline-content p {
          margin: 0;
        }
        .client-detail .vertical-timeline-icon.gray-bg {
          color: #a7aaab;
        }
        .clients-list .nav-tabs > li.active > a,
        .clients-list .nav-tabs > li.active > a:hover,
        .clients-list .nav-tabs > li.active > a:focus {
          border-bottom: 1px solid #fff;
        }
        /* BLOG ARTICLE */
        .blog h2 {
          font-weight: 700;
        }
        .blog h5 {
          margin: 0 0 5px 0;
        }
        .blog .btn {
          margin: 0 0 5px 0;
        }
        .article h1 {
          font-size: 48px;
          font-weight: 700;
          color: #2F4050;
        }
        .article p {
          font-size: 15px;
          line-height: 26px;
        }
        .article-title {
          text-align: center;
          margin: 40px 0 100px 0;
        }
        .article .ibox-content {
          padding: 40px;
        }
        /* ISSUE TRACKER */
        .issue-tracker .btn-link {
          color: #1ab394;
        }
        table.issue-tracker tbody tr td {
          vertical-align: middle;
          height: 50px;
        }
        .issue-info {
          width: 50%;
        }
        .issue-info a {
          font-weight: 600;
          color: #676a6c;
        }
        .issue-info small {
          display: block;
        }
        /* TEAMS */
        .team-members {
          margin: 10px 0;
        }
        .team-members img.img-circle {
          width: 42px;
          height: 42px;
          margin-bottom: 5px;
        }
        /* AGILE BOARD */
        .sortable-list {
          padding: 10px 0;
        }
        .agile-list {
          list-style: none;
          margin: 0;
        }
        .agile-list li {
          background: #FAFAFB;
          border: 1px solid #e7eaec;
          margin: 0 0 10px 0;
          padding: 10px;
          border-radius: 2px;
        }
        .agile-list li:hover {
          cursor: pointer;
          background: #fff;
        }
        .agile-list li.warning-element {
          border-left: 3px solid #f8ac59;
        }
        .agile-list li.danger-element {
          border-left: 3px solid #ed5565;
        }
        .agile-list li.info-element {
          border-left: 3px solid #1c84c6;
        }
        .agile-list li.success-element {
          border-left: 3px solid #1ab394;
        }
        .agile-detail {
          margin-top: 5px;
          font-size: 12px;
        }
        /* DIFF */
        ins {
          background-color: #c6ffc6;
          text-decoration: none;
        }
        del {
          background-color: #ffc6c6;
        }
        /* E-commerce */
        .product-box {
          padding: 0;
          border: 1px solid #e7eaec;
        }
        .product-box:hover,
        .product-box.active {
          border: 1px solid transparent;
          -webkit-box-shadow: 0 3px 7px 0 #a8a8a8;
          -moz-box-shadow: 0 3px 7px 0 #a8a8a8;
          box-shadow: 0 3px 7px 0 #a8a8a8;
        }
        .product-imitation {
          text-align: center;
          padding: 90px 0;
          background-color: #f8f8f9;
          color: #bebec3;
          font-weight: 600;
        }
        .cart-product-imitation {
          text-align: center;
          padding-top: 30px;
          height: 80px;
          width: 80px;
          background-color: #f8f8f9;
        }
        .product-imitation.xl {
          padding: 120px 0;
        }
        .product-desc {
          padding: 20px;
          position: relative;
        }
        .ecommerce .tag-list {
          padding: 0;
        }
        .ecommerce .fa-star {
          color: #d1dade;
        }
        .ecommerce .fa-star.active {
          color: #f8ac59;
        }
        .ecommerce .note-editor {
          border: 1px solid #e7eaec;
        }
        table.shoping-cart-table {
          margin-bottom: 0;
        }
        table.shoping-cart-table tr td {
          border: none;
          text-align: right;
        }
        table.shoping-cart-table tr td.desc,
        table.shoping-cart-table tr td:first-child {
          text-align: left;
        }
        table.shoping-cart-table tr td:last-child {
          width: 80px;
        }
        .product-name {
          font-size: 16px;
          font-weight: 600;
          color: #676a6c;
          display: block;
          margin: 2px 0 5px 0;
        }
        .product-name:hover,
        .product-name:focus {
          color: #1ab394;
        }
        .product-price {
          font-size: 14px;
          font-weight: 600;
          color: #ffffff;
          background-color: #1ab394;
          padding: 6px 12px;
          position: absolute;
          top: -32px;
          right: 0;
        }
        .product-detail .ibox-content {
          padding: 30px 30px 50px 30px;
        }
        .image-imitation {
          background-color: #f8f8f9;
          text-align: center;
          padding: 200px 0;
        }
        .product-main-price small {
          font-size: 10px;
        }
        .product-images {
          margin: 0 20px;
        }
        /* Social feed */
        .social-feed-separated .social-feed-box {
          margin-left: 62px;
        }
        .social-feed-separated .social-avatar {
          float: left;
          padding: 0;
        }
        .social-feed-separated .social-avatar img {
          width: 52px;
          height: 52px;
          border: 1px solid #e7eaec;
        }
        .social-feed-separated .social-feed-box .social-avatar {
          padding: 15px 15px 0 15px;
          float: none;
        }
        .social-feed-box {
          /*padding: 15px;*/
          border: 1px solid #e7eaec;
          background: #fff;
          margin-bottom: 15px;
        }
        .article .social-feed-box {
          margin-bottom: 0;
          border-bottom: none;
        }
        .article .social-feed-box:last-child {
          margin-bottom: 0;
          border-bottom: 1px solid #e7eaec;
        }
        .article .social-feed-box p {
          font-size: 13px;
          line-height: 18px;
        }
        .social-action {
          margin: 15px;
        }
        .social-avatar {
          padding: 15px 15px 0 15px;
        }
        .social-comment .social-comment {
          margin-left: 45px;
        }
        .social-avatar img {
          height: 40px;
          width: 40px;
          margin-right: 10px;
        }
        .social-avatar .media-body a {
          font-size: 14px;
          display: block;
        }
        .social-body {
          padding: 15px;
        }
        .social-body img {
          margin-bottom: 10px;
        }
        .social-footer {
          border-top: 1px solid #e7eaec;
          padding: 10px 15px;
          background: #f9f9f9;
        }
        .social-footer .social-comment img {
          width: 32px;
          margin-right: 10px;
        }
        .social-comment:first-child {
          margin-top: 0;
        }
        .social-comment {
          margin-top: 15px;
        }
        .social-comment textarea {
          font-size: 12px;
        }
        /* Vote list */
        .vote-item {
          padding: 20px 25px;
          background: #ffffff;
          border-top: 1px solid #e7eaec;
        }
        .vote-item:last-child {
          border-bottom: 1px solid #e7eaec;
        }
        .vote-item:hover {
          background: #fbfbfb;
        }
        .vote-actions {
          float: left;
          width: 30px;
          margin-right: 15px;
          text-align: center;
        }
        .vote-actions a {
          color: #1ab394;
          font-weight: 600;
        }
        .vote-actions {
          font-weight: 600;
        }
        .vote-title {
          display: block;
          color: inherit;
          font-size: 18px;
          font-weight: 600;
          margin-top: 5px;
          margin-bottom: 2px;
        }
        .vote-title:hover,
        .vote-title:focus {
          color: inherit;
        }
        .vote-info,
        .vote-title {
          margin-left: 45px;
        }
        .vote-info,
        .vote-info a {
          color: #b4b6b8;
          font-size: 12px;
        }
        .vote-info a {
          margin-right: 10px;
        }
        .vote-info a:hover {
          color: #1ab394;
        }
        .vote-icon {
          text-align: right;
          font-size: 38px;
          display: block;
          color: #e8e9ea;
        }
        .vote-icon.active {
          color: #1ab394;
        }
        body.body-small .vote-icon {
          display: none;
        }
        .lightBoxGallery {
          text-align: center;
        }
        .lightBoxGallery img {
          margin: 5px;
        }
        #small-chat {
          position: fixed;
          bottom: 20px;
          right: 20px;
          z-index: 100;
        }
        #small-chat .badge {
          position: absolute;
          top: -3px;
          right: -4px;
        }
        .open-small-chat {
          height: 38px;
          width: 38px;
          display: block;
          background: #1ab394;
          padding: 9px 8px;
          text-align: center;
          color: #fff;
          border-radius: 50%;
        }
        .open-small-chat:hover {
          color: white;
          background: #1ab394;
        }
        .small-chat-box {
          display: none;
          position: fixed;
          bottom: 20px;
          right: 75px;
          background: #fff;
          border: 1px solid #e7eaec;
          width: 230px;
          height: 320px;
          border-radius: 4px;
        }
        .small-chat-box.ng-small-chat {
          display: block;
        }
        .body-small .small-chat-box {
          bottom: 70px;
          right: 20px;
        }
        .small-chat-box.active {
          display: block;
        }
        .small-chat-box .heading {
          background: #2f4050;
          padding: 8px 15px;
          font-weight: bold;
          color: #fff;
        }
        .small-chat-box .chat-date {
          opacity: 0.6;
          font-size: 10px;
          font-weight: normal;
        }
        .small-chat-box .content {
          padding: 15px 15px;
        }
        .small-chat-box .content .author-name {
          font-weight: bold;
          margin-bottom: 3px;
          font-size: 11px;
        }
        .small-chat-box .content > div {
          padding-bottom: 20px;
        }
        .small-chat-box .content .chat-message {
          padding: 5px 10px;
          border-radius: 6px;
          font-size: 11px;
          line-height: 14px;
          max-width: 80%;
          background: #f3f3f4;
          margin-bottom: 10px;
        }
        .small-chat-box .content .chat-message.active {
          background: #1ab394;
          color: #fff;
        }
        .small-chat-box .content .left {
          text-align: left;
          clear: both;
        }
        .small-chat-box .content .left .chat-message {
          float: left;
        }
        .small-chat-box .content .right {
          text-align: right;
          clear: both;
        }
        .small-chat-box .content .right .chat-message {
          float: right;
        }
        .small-chat-box .form-chat {
          padding: 10px 10px;
        }
        /*
         * metismenu - v2.0.2
         * A jQuery menu plugin
         * https://github.com/onokumus/metisMenu
         *
         * Made by Osman Nuri Okumus
         * Under MIT License
         */
        .metismenu .plus-minus,
        .metismenu .plus-times {
          float: right;
        }
        .metismenu .arrow {
          float: right;
          line-height: 1.42857;
        }
        .metismenu .glyphicon.arrow:before {
          content: "\e079";
        }
        .metismenu .active > a > .glyphicon.arrow:before {
          content: "\e114";
        }
        .metismenu .fa.arrow:before {
          content: "\f104";
        }
        .metismenu .active > a > .fa.arrow:before {
          content: "\f107";
        }
        .metismenu .ion.arrow:before {
          content: "\f3d2";
        }
        .metismenu .active > a > .ion.arrow:before {
          content: "\f3d0";
        }
        .metismenu .fa.plus-minus:before,
        .metismenu .fa.plus-times:before {
          content: "\f067";
        }
        .metismenu .active > a > .fa.plus-times {
          -webkit-transform: rotate(45deg);
          -ms-transform: rotate(45deg);
          transform: rotate(45deg);
        }
        .metismenu .active > a > .fa.plus-minus:before {
          content: "\f068";
        }
        .metismenu .collapse {
          display: none;
        }
        .metismenu .collapse.in {
          display: block;
        }
        .metismenu .collapsing {
          position: relative;
          height: 0;
          overflow: hidden;
          -webkit-transition-timing-function: ease;
          transition-timing-function: ease;
          -webkit-transition-duration: .35s;
          transition-duration: .35s;
          -webkit-transition-property: height, visibility;
          transition-property: height, visibility;
        }
        .mini-navbar .metismenu .collapse {
          opacity: 0;
        }
        .mini-navbar .metismenu .collapse.in {
          opacity: 1;
        }
        .mini-navbar .metismenu .collapse a {
          display: none;
        }
        .mini-navbar .metismenu .collapse.in a {
          display: block;
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-rotating-plane"></div>
         *
         */
        .sk-spinner-rotating-plane.sk-spinner {
          width: 30px;
          height: 30px;
          background-color: #1ab394;
          margin: 0 auto;
          -webkit-animation: sk-rotatePlane 1.2s infinite ease-in-out;
          animation: sk-rotatePlane 1.2s infinite ease-in-out;
        }
        @-webkit-keyframes sk-rotatePlane {
          0% {
            -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg);
            transform: perspective(120px) rotateX(0deg) rotateY(0deg);
          }
          50% {
            -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
            transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
          }
          100% {
            -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
            transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
          }
        }
        @keyframes sk-rotatePlane {
          0% {
            -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg);
            transform: perspective(120px) rotateX(0deg) rotateY(0deg);
          }
          50% {
            -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
            transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
          }
          100% {
            -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
            transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-double-bounce">
         *      <div class="sk-double-bounce1"></div>
         *      <div class="sk-double-bounce2"></div>
         *    </div>
         *
         */
        .sk-spinner-double-bounce.sk-spinner {
          width: 40px;
          height: 40px;
          position: relative;
          margin: 0 auto;
        }
        .sk-spinner-double-bounce .sk-double-bounce1,
        .sk-spinner-double-bounce .sk-double-bounce2 {
          width: 100%;
          height: 100%;
          border-radius: 50%;
          background-color: #1ab394;
          opacity: 0.6;
          position: absolute;
          top: 0;
          left: 0;
          -webkit-animation: sk-doubleBounce 2s infinite ease-in-out;
          animation: sk-doubleBounce 2s infinite ease-in-out;
        }
        .sk-spinner-double-bounce .sk-double-bounce2 {
          -webkit-animation-delay: -1s;
          animation-delay: -1s;
        }
        @-webkit-keyframes sk-doubleBounce {
          0%,
          100% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          50% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
        @keyframes sk-doubleBounce {
          0%,
          100% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          50% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-wave">
         *      <div class="sk-rect1"></div>
         *      <div class="sk-rect2"></div>
         *      <div class="sk-rect3"></div>
         *      <div class="sk-rect4"></div>
         *      <div class="sk-rect5"></div>
         *    </div>
         *
         */
        .sk-spinner-wave.sk-spinner {
          margin: 0 auto;
          width: 50px;
          height: 30px;
          text-align: center;
          font-size: 10px;
        }
        .sk-spinner-wave div {
          background-color: #1ab394;
          height: 100%;
          width: 6px;
          display: inline-block;
          -webkit-animation: sk-waveStretchDelay 1.2s infinite ease-in-out;
          animation: sk-waveStretchDelay 1.2s infinite ease-in-out;
        }
        .sk-spinner-wave .sk-rect2 {
          -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s;
        }
        .sk-spinner-wave .sk-rect3 {
          -webkit-animation-delay: -1s;
          animation-delay: -1s;
        }
        .sk-spinner-wave .sk-rect4 {
          -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
        }
        .sk-spinner-wave .sk-rect5 {
          -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s;
        }
        @-webkit-keyframes sk-waveStretchDelay {
          0%,
          40%,
          100% {
            -webkit-transform: scaleY(0.4);
            transform: scaleY(0.4);
          }
          20% {
            -webkit-transform: scaleY(1);
            transform: scaleY(1);
          }
        }
        @keyframes sk-waveStretchDelay {
          0%,
          40%,
          100% {
            -webkit-transform: scaleY(0.4);
            transform: scaleY(0.4);
          }
          20% {
            -webkit-transform: scaleY(1);
            transform: scaleY(1);
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-wandering-cubes">
         *      <div class="sk-cube1"></div>
         *      <div class="sk-cube2"></div>
         *    </div>
         *
         */
        .sk-spinner-wandering-cubes.sk-spinner {
          margin: 0 auto;
          width: 32px;
          height: 32px;
          position: relative;
        }
        .sk-spinner-wandering-cubes .sk-cube1,
        .sk-spinner-wandering-cubes .sk-cube2 {
          background-color: #1ab394;
          width: 10px;
          height: 10px;
          position: absolute;
          top: 0;
          left: 0;
          -webkit-animation: sk-wanderingCubeMove 1.8s infinite ease-in-out;
          animation: sk-wanderingCubeMove 1.8s infinite ease-in-out;
        }
        .sk-spinner-wandering-cubes .sk-cube2 {
          -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
        }
        @-webkit-keyframes sk-wanderingCubeMove {
          25% {
            -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5);
            transform: translateX(42px) rotate(-90deg) scale(0.5);
          }
          50% {
            /* Hack to make FF rotate in the right direction */
            -webkit-transform: translateX(42px) translateY(42px) rotate(-179deg);
            transform: translateX(42px) translateY(42px) rotate(-179deg);
          }
          50.1% {
            -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg);
            transform: translateX(42px) translateY(42px) rotate(-180deg);
          }
          75% {
            -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
            transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
          }
          100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
          }
        }
        @keyframes sk-wanderingCubeMove {
          25% {
            -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5);
            transform: translateX(42px) rotate(-90deg) scale(0.5);
          }
          50% {
            /* Hack to make FF rotate in the right direction */
            -webkit-transform: translateX(42px) translateY(42px) rotate(-179deg);
            transform: translateX(42px) translateY(42px) rotate(-179deg);
          }
          50.1% {
            -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg);
            transform: translateX(42px) translateY(42px) rotate(-180deg);
          }
          75% {
            -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
            transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
          }
          100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-pulse"></div>
         *
         */
        .sk-spinner-pulse.sk-spinner {
          width: 40px;
          height: 40px;
          margin: 0 auto;
          background-color: #1ab394;
          border-radius: 100%;
          -webkit-animation: sk-pulseScaleOut 1s infinite ease-in-out;
          animation: sk-pulseScaleOut 1s infinite ease-in-out;
        }
        @-webkit-keyframes sk-pulseScaleOut {
          0% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 0;
          }
        }
        @keyframes sk-pulseScaleOut {
          0% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 0;
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-chasing-dots">
         *      <div class="sk-dot1"></div>
         *      <div class="sk-dot2"></div>
         *    </div>
         *
         */
        .sk-spinner-chasing-dots.sk-spinner {
          margin: 0 auto;
          width: 40px;
          height: 40px;
          position: relative;
          text-align: center;
          -webkit-animation: sk-chasingDotsRotate 2s infinite linear;
          animation: sk-chasingDotsRotate 2s infinite linear;
        }
        .sk-spinner-chasing-dots .sk-dot1,
        .sk-spinner-chasing-dots .sk-dot2 {
          width: 60%;
          height: 60%;
          display: inline-block;
          position: absolute;
          top: 0;
          background-color: #1ab394;
          border-radius: 100%;
          -webkit-animation: sk-chasingDotsBounce 2s infinite ease-in-out;
          animation: sk-chasingDotsBounce 2s infinite ease-in-out;
        }
        .sk-spinner-chasing-dots .sk-dot2 {
          top: auto;
          bottom: 0;
          -webkit-animation-delay: -1s;
          animation-delay: -1s;
        }
        @-webkit-keyframes sk-chasingDotsRotate {
          100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        @keyframes sk-chasingDotsRotate {
          100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        @-webkit-keyframes sk-chasingDotsBounce {
          0%,
          100% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          50% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
        @keyframes sk-chasingDotsBounce {
          0%,
          100% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          50% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-three-bounce">
         *      <div class="sk-bounce1"></div>
         *      <div class="sk-bounce2"></div>
         *      <div class="sk-bounce3"></div>
         *    </div>
         *
         */
        .sk-spinner-three-bounce.sk-spinner {
          margin: 0 auto;
          width: 70px;
          text-align: center;
        }
        .sk-spinner-three-bounce div {
          width: 18px;
          height: 18px;
          background-color: #1ab394;
          border-radius: 100%;
          display: inline-block;
          -webkit-animation: sk-threeBounceDelay 1.4s infinite ease-in-out;
          animation: sk-threeBounceDelay 1.4s infinite ease-in-out;
          /* Prevent first frame from flickering when animation starts */
          -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
        }
        .sk-spinner-three-bounce .sk-bounce1 {
          -webkit-animation-delay: -0.32s;
          animation-delay: -0.32s;
        }
        .sk-spinner-three-bounce .sk-bounce2 {
          -webkit-animation-delay: -0.16s;
          animation-delay: -0.16s;
        }
        @-webkit-keyframes sk-threeBounceDelay {
          0%,
          80%,
          100% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          40% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
        @keyframes sk-threeBounceDelay {
          0%,
          80%,
          100% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          40% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-circle">
         *      <div class="sk-circle1 sk-circle"></div>
         *      <div class="sk-circle2 sk-circle"></div>
         *      <div class="sk-circle3 sk-circle"></div>
         *      <div class="sk-circle4 sk-circle"></div>
         *      <div class="sk-circle5 sk-circle"></div>
         *      <div class="sk-circle6 sk-circle"></div>
         *      <div class="sk-circle7 sk-circle"></div>
         *      <div class="sk-circle8 sk-circle"></div>
         *      <div class="sk-circle9 sk-circle"></div>
         *      <div class="sk-circle10 sk-circle"></div>
         *      <div class="sk-circle11 sk-circle"></div>
         *      <div class="sk-circle12 sk-circle"></div>
         *    </div>
         *
         */
        .sk-spinner-circle.sk-spinner {
          margin: 0 auto;
          width: 22px;
          height: 22px;
          position: relative;
        }
        .sk-spinner-circle .sk-circle {
          width: 100%;
          height: 100%;
          position: absolute;
          left: 0;
          top: 0;
        }
        .sk-spinner-circle .sk-circle:before {
          content: '';
          display: block;
          margin: 0 auto;
          width: 20%;
          height: 20%;
          background-color: #1ab394;
          border-radius: 100%;
          -webkit-animation: sk-circleBounceDelay 1.2s infinite ease-in-out;
          animation: sk-circleBounceDelay 1.2s infinite ease-in-out;
          /* Prevent first frame from flickering when animation starts */
          -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
        }
        .sk-spinner-circle .sk-circle2 {
          -webkit-transform: rotate(30deg);
          -ms-transform: rotate(30deg);
          transform: rotate(30deg);
        }
        .sk-spinner-circle .sk-circle3 {
          -webkit-transform: rotate(60deg);
          -ms-transform: rotate(60deg);
          transform: rotate(60deg);
        }
        .sk-spinner-circle .sk-circle4 {
          -webkit-transform: rotate(90deg);
          -ms-transform: rotate(90deg);
          transform: rotate(90deg);
        }
        .sk-spinner-circle .sk-circle5 {
          -webkit-transform: rotate(120deg);
          -ms-transform: rotate(120deg);
          transform: rotate(120deg);
        }
        .sk-spinner-circle .sk-circle6 {
          -webkit-transform: rotate(150deg);
          -ms-transform: rotate(150deg);
          transform: rotate(150deg);
        }
        .sk-spinner-circle .sk-circle7 {
          -webkit-transform: rotate(180deg);
          -ms-transform: rotate(180deg);
          transform: rotate(180deg);
        }
        .sk-spinner-circle .sk-circle8 {
          -webkit-transform: rotate(210deg);
          -ms-transform: rotate(210deg);
          transform: rotate(210deg);
        }
        .sk-spinner-circle .sk-circle9 {
          -webkit-transform: rotate(240deg);
          -ms-transform: rotate(240deg);
          transform: rotate(240deg);
        }
        .sk-spinner-circle .sk-circle10 {
          -webkit-transform: rotate(270deg);
          -ms-transform: rotate(270deg);
          transform: rotate(270deg);
        }
        .sk-spinner-circle .sk-circle11 {
          -webkit-transform: rotate(300deg);
          -ms-transform: rotate(300deg);
          transform: rotate(300deg);
        }
        .sk-spinner-circle .sk-circle12 {
          -webkit-transform: rotate(330deg);
          -ms-transform: rotate(330deg);
          transform: rotate(330deg);
        }
        .sk-spinner-circle .sk-circle2:before {
          -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s;
        }
        .sk-spinner-circle .sk-circle3:before {
          -webkit-animation-delay: -1s;
          animation-delay: -1s;
        }
        .sk-spinner-circle .sk-circle4:before {
          -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
        }
        .sk-spinner-circle .sk-circle5:before {
          -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s;
        }
        .sk-spinner-circle .sk-circle6:before {
          -webkit-animation-delay: -0.7s;
          animation-delay: -0.7s;
        }
        .sk-spinner-circle .sk-circle7:before {
          -webkit-animation-delay: -0.6s;
          animation-delay: -0.6s;
        }
        .sk-spinner-circle .sk-circle8:before {
          -webkit-animation-delay: -0.5s;
          animation-delay: -0.5s;
        }
        .sk-spinner-circle .sk-circle9:before {
          -webkit-animation-delay: -0.4s;
          animation-delay: -0.4s;
        }
        .sk-spinner-circle .sk-circle10:before {
          -webkit-animation-delay: -0.3s;
          animation-delay: -0.3s;
        }
        .sk-spinner-circle .sk-circle11:before {
          -webkit-animation-delay: -0.2s;
          animation-delay: -0.2s;
        }
        .sk-spinner-circle .sk-circle12:before {
          -webkit-animation-delay: -0.1s;
          animation-delay: -0.1s;
        }
        @-webkit-keyframes sk-circleBounceDelay {
          0%,
          80%,
          100% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          40% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
        @keyframes sk-circleBounceDelay {
          0%,
          80%,
          100% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          40% {
            -webkit-transform: scale(1);
            transform: scale(1);
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-cube-grid">
         *      <div class="sk-cube"></div>
         *      <div class="sk-cube"></div>
         *      <div class="sk-cube"></div>
         *      <div class="sk-cube"></div>
         *      <div class="sk-cube"></div>
         *      <div class="sk-cube"></div>
         *      <div class="sk-cube"></div>
         *      <div class="sk-cube"></div>
         *      <div class="sk-cube"></div>
         *    </div>
         *
         */
        .sk-spinner-cube-grid {
          /*
           * Spinner positions
           * 1 2 3
           * 4 5 6
           * 7 8 9
           */
        }
        .sk-spinner-cube-grid.sk-spinner {
          width: 30px;
          height: 30px;
          margin: 0 auto;
        }
        .sk-spinner-cube-grid .sk-cube {
          width: 33%;
          height: 33%;
          background-color: #1ab394;
          float: left;
          -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
          animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
        }
        .sk-spinner-cube-grid .sk-cube:nth-child(1) {
          -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
        }
        .sk-spinner-cube-grid .sk-cube:nth-child(2) {
          -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
        }
        .sk-spinner-cube-grid .sk-cube:nth-child(3) {
          -webkit-animation-delay: 0.4s;
          animation-delay: 0.4s;
        }
        .sk-spinner-cube-grid .sk-cube:nth-child(4) {
          -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
        }
        .sk-spinner-cube-grid .sk-cube:nth-child(5) {
          -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
        }
        .sk-spinner-cube-grid .sk-cube:nth-child(6) {
          -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
        }
        .sk-spinner-cube-grid .sk-cube:nth-child(7) {
          -webkit-animation-delay: 0s;
          animation-delay: 0s;
        }
        .sk-spinner-cube-grid .sk-cube:nth-child(8) {
          -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
        }
        .sk-spinner-cube-grid .sk-cube:nth-child(9) {
          -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
        }
        @-webkit-keyframes sk-cubeGridScaleDelay {
          0%,
          70%,
          100% {
            -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
          }
          35% {
            -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
          }
        }
        @keyframes sk-cubeGridScaleDelay {
          0%,
          70%,
          100% {
            -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
          }
          35% {
            -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-wordpress">
         *      <span class="sk-inner-circle"></span>
         *    </div>
         *
         */
        .sk-spinner-wordpress.sk-spinner {
          background-color: #1ab394;
          width: 30px;
          height: 30px;
          border-radius: 30px;
          position: relative;
          margin: 0 auto;
          -webkit-animation: sk-innerCircle 1s linear infinite;
          animation: sk-innerCircle 1s linear infinite;
        }
        .sk-spinner-wordpress .sk-inner-circle {
          display: block;
          background-color: #fff;
          width: 8px;
          height: 8px;
          position: absolute;
          border-radius: 8px;
          top: 5px;
          left: 5px;
        }
        @-webkit-keyframes sk-innerCircle {
          0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
          }
          100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        @keyframes sk-innerCircle {
          0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
          }
          100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        /*
         *  Usage:
         *
         *    <div class="sk-spinner sk-spinner-fading-circle">
         *      <div class="sk-circle1 sk-circle"></div>
         *      <div class="sk-circle2 sk-circle"></div>
         *      <div class="sk-circle3 sk-circle"></div>
         *      <div class="sk-circle4 sk-circle"></div>
         *      <div class="sk-circle5 sk-circle"></div>
         *      <div class="sk-circle6 sk-circle"></div>
         *      <div class="sk-circle7 sk-circle"></div>
         *      <div class="sk-circle8 sk-circle"></div>
         *      <div class="sk-circle9 sk-circle"></div>
         *      <div class="sk-circle10 sk-circle"></div>
         *      <div class="sk-circle11 sk-circle"></div>
         *      <div class="sk-circle12 sk-circle"></div>
         *    </div>
         *
         */
        .sk-spinner-fading-circle.sk-spinner {
          margin: 0 auto;
          width: 22px;
          height: 22px;
          position: relative;
        }
        .sk-spinner-fading-circle .sk-circle {
          width: 100%;
          height: 100%;
          position: absolute;
          left: 0;
          top: 0;
        }
        .sk-spinner-fading-circle .sk-circle:before {
          content: '';
          display: block;
          margin: 0 auto;
          width: 18%;
          height: 18%;
          background-color: #1ab394;
          border-radius: 100%;
          -webkit-animation: sk-circleFadeDelay 1.2s infinite ease-in-out;
          animation: sk-circleFadeDelay 1.2s infinite ease-in-out;
          /* Prevent first frame from flickering when animation starts */
          -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
        }
        .sk-spinner-fading-circle .sk-circle2 {
          -webkit-transform: rotate(30deg);
          -ms-transform: rotate(30deg);
          transform: rotate(30deg);
        }
        .sk-spinner-fading-circle .sk-circle3 {
          -webkit-transform: rotate(60deg);
          -ms-transform: rotate(60deg);
          transform: rotate(60deg);
        }
        .sk-spinner-fading-circle .sk-circle4 {
          -webkit-transform: rotate(90deg);
          -ms-transform: rotate(90deg);
          transform: rotate(90deg);
        }
        .sk-spinner-fading-circle .sk-circle5 {
          -webkit-transform: rotate(120deg);
          -ms-transform: rotate(120deg);
          transform: rotate(120deg);
        }
        .sk-spinner-fading-circle .sk-circle6 {
          -webkit-transform: rotate(150deg);
          -ms-transform: rotate(150deg);
          transform: rotate(150deg);
        }
        .sk-spinner-fading-circle .sk-circle7 {
          -webkit-transform: rotate(180deg);
          -ms-transform: rotate(180deg);
          transform: rotate(180deg);
        }
        .sk-spinner-fading-circle .sk-circle8 {
          -webkit-transform: rotate(210deg);
          -ms-transform: rotate(210deg);
          transform: rotate(210deg);
        }
        .sk-spinner-fading-circle .sk-circle9 {
          -webkit-transform: rotate(240deg);
          -ms-transform: rotate(240deg);
          transform: rotate(240deg);
        }
        .sk-spinner-fading-circle .sk-circle10 {
          -webkit-transform: rotate(270deg);
          -ms-transform: rotate(270deg);
          transform: rotate(270deg);
        }
        .sk-spinner-fading-circle .sk-circle11 {
          -webkit-transform: rotate(300deg);
          -ms-transform: rotate(300deg);
          transform: rotate(300deg);
        }
        .sk-spinner-fading-circle .sk-circle12 {
          -webkit-transform: rotate(330deg);
          -ms-transform: rotate(330deg);
          transform: rotate(330deg);
        }
        .sk-spinner-fading-circle .sk-circle2:before {
          -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s;
        }
        .sk-spinner-fading-circle .sk-circle3:before {
          -webkit-animation-delay: -1s;
          animation-delay: -1s;
        }
        .sk-spinner-fading-circle .sk-circle4:before {
          -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
        }
        .sk-spinner-fading-circle .sk-circle5:before {
          -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s;
        }
        .sk-spinner-fading-circle .sk-circle6:before {
          -webkit-animation-delay: -0.7s;
          animation-delay: -0.7s;
        }
        .sk-spinner-fading-circle .sk-circle7:before {
          -webkit-animation-delay: -0.6s;
          animation-delay: -0.6s;
        }
        .sk-spinner-fading-circle .sk-circle8:before {
          -webkit-animation-delay: -0.5s;
          animation-delay: -0.5s;
        }
        .sk-spinner-fading-circle .sk-circle9:before {
          -webkit-animation-delay: -0.4s;
          animation-delay: -0.4s;
        }
        .sk-spinner-fading-circle .sk-circle10:before {
          -webkit-animation-delay: -0.3s;
          animation-delay: -0.3s;
        }
        .sk-spinner-fading-circle .sk-circle11:before {
          -webkit-animation-delay: -0.2s;
          animation-delay: -0.2s;
        }
        .sk-spinner-fading-circle .sk-circle12:before {
          -webkit-animation-delay: -0.1s;
          animation-delay: -0.1s;
        }
        @-webkit-keyframes sk-circleFadeDelay {
          0%,
          39%,
          100% {
            opacity: 0;
          }
          40% {
            opacity: 1;
          }
        }
        @keyframes sk-circleFadeDelay {
          0%,
          39%,
          100% {
            opacity: 0;
          }
          40% {
            opacity: 1;
          }
        }
        /*
         *
         *   INSPINIA Landing Page - Responsive Admin Theme
         *   Copyright 2014 Webapplayers.com
         *
        */
        /* GLOBAL STYLES
        -------------------------------------------------- */
        /* PACE PLUGIN
        -------------------------------------------------- */
        .landing-page.pace .pace-progress {
          background: #fff;
          position: fixed;
          z-index: 2000;
          top: 0;
          left: 0;
          height: 2px;
          -webkit-transition: width 1s;
          -moz-transition: width 1s;
          -o-transition: width 1s;
          transition: width 1s;
        }
        .pace-inactive {
          display: none;
        }
        body.landing-page {
          color: #676a6c;
          font-family: 'Open Sans', helvetica, arial, sans-serif;
          background-color: #fff;
        }
        .landing-page {
          /* CUSTOMIZE THE NAVBAR
          -------------------------------------------------- */
          /* Flip around the padding for proper display in narrow viewports */
          /* BACKGROUNDS SLIDER
          -------------------------------------------------- */
          /* CUSTOMIZE THE CAROUSEL
          -------------------------------------------------- */
          /* Carousel base class */
          /* Since positioning the image, we need to help out the caption */
          /* Declare heights because of positioning of img element */
          /* Sections
          ------------------------- */
          /* Buttons - only primary custom button
          ------------------------- */
          /* RESPONSIVE CSS
          -------------------------------------------------- */
        }
        .landing-page span.navy {
          color: #1ab394;
        }
        .landing-page p.text-color {
          color: #676a6c;
        }
        .landing-page a.navy-link {
          color: #1ab394;
          text-decoration: none;
        }
        .landing-page a.navy-link:hover {
          color: #179d82;
        }
        .landing-page section p {
          color: #aeaeae;
          font-size: 13px;
        }
        .landing-page address {
          font-size: 13px;
        }
        .landing-page h1 {
          margin-top: 10px;
          font-size: 30px;
          font-weight: 200;
        }
        .landing-page .navy-line {
          width: 60px;
          height: 1px;
          margin: 60px auto 0;
          border-bottom: 2px solid #1ab394;
        }
        .landing-page .navbar-wrapper {
          position: fixed;
          top: 0;
          right: 0;
          left: 0;
          z-index: 200;
        }
        .landing-page .navbar-wrapper > .container {
          padding-right: 0;
          padding-left: 0;
        }
        .landing-page .navbar-wrapper .navbar {
          padding-right: 15px;
          padding-left: 15px;
        }
        .landing-page .navbar-default.navbar-scroll {
          background-color: #fff;
          border-color: #fff;
          padding: 15px 0;
        }
        .landing-page .navbar-default {
          background-color: transparent;
          border-color: transparent;
          transition: all 0.3s ease-in-out 0s;
        }
        .landing-page .navbar-default .nav li a {
          color: #fff;
          font-family: 'Open Sans', helvetica, arial, sans-serif;
          font-weight: 700;
          letter-spacing: 1px;
          text-transform: uppercase;
          font-size: 14px;
        }
        .landing-page .navbar-nav > li > a {
          padding-top: 25px;
          border-top: 6px solid transparent;
        }
        .landing-page .navbar-default .navbar-nav > .active > a,
        .landing-page .navbar-default .navbar-nav > .active > a:hover {
          background: transparent;
          color: #fff;
          border-top: 6px solid #1ab394;
        }
        .landing-page .navbar-default .navbar-nav > li > a:hover,
        .landing-page .navbar-default .navbar-nav > li > a:focus {
          color: #1ab394;
          background: inherit;
        }
        .landing-page .navbar-default .navbar-nav > .active > a:focus {
          background: transparent;
          color: #fff;
        }
        .landing-page .navbar-default .navbar-nav > .active > a:focus {
          background: transparent;
          color: #ffffff;
        }
        .landing-page .navbar-default.navbar-scroll .navbar-nav > .active > a:focus {
          background: transparent;
          color: inherit;
        }
        .landing-page .navbar-default .navbar-brand:hover,
        .landing-page .navbar-default .navbar-brand:focus {
          background: #179d82;
          color: #fff;
        }
        .landing-page .navbar-default .navbar-brand {
          color: #fff;
          height: auto;
          display: block;
          font-size: 14px;
          background: #1ab394;
          padding: 15px 20px 15px 20px;
          border-radius: 0 0 5px 5px;
          font-weight: 700;
          transition: all 0.3s ease-in-out 0s;
        }
        .landing-page .navbar-scroll.navbar-default .nav li a {
          color: #676a6c;
        }
        .landing-page .navbar-scroll.navbar-default .nav li a:hover {
          color: #1ab394;
        }
        .landing-page .navbar-wrapper .navbar.navbar-scroll {
          padding-top: 0;
          padding-bottom: 0;
          border-bottom: 1px solid #e7eaec;
          border-radius: 0;
        }
        .landing-page .nav > li.active {
          border: none;
          background: inherit;
        }
        .landing-page .nav > li > a {
          padding: 25px 10px 15px 10px;
        }
        .landing-page .navbar-scroll .navbar-nav > li > a {
          padding: 20px 10px;
        }
        .landing-page .navbar-default .navbar-nav > .active > a,
        .landing-page .navbar-default .navbar-nav > .active > a:hover {
          border-top: 6px solid #1ab394;
        }
        .landing-page .navbar-fixed-top {
          border: none !important;
        }
        .landing-page .navbar-fixed-top.navbar-scroll {
          border-bottom: 1px solid #e7eaec !important;
        }
        .landing-page .navbar.navbar-scroll .navbar-brand {
          margin-top: 15px;
          border-radius: 5px;
          font-size: 12px;
          padding: 10px;
          height: auto;
        }
        .landing-page .header-back {
          height: 470px;
          width: 100%;
        }
        .landing-page .header-back.one {
          background: url('../img/landing/header_one.jpg') 50% 0 no-repeat;
        }
        .landing-page .header-back.two {
          background: url('../img/landing/header_two.jpg') 50% 0 no-repeat;
        }
        .landing-page .carousel {
          height: 470px;
        }
        .landing-page .carousel-caption {
          z-index: 10;
        }
        .landing-page .carousel .item {
          height: 470px;
          background-color: #777;
        }
        .landing-page .carousel-inner > .item > img {
          position: absolute;
          top: 0;
          left: 0;
          min-width: 100%;
          height: 470px;
        }
        .landing-page .carousel-fade .carousel-inner .item {
          opacity: 0;
          -webkit-transition-property: opacity;
          transition-property: opacity;
        }
        .landing-page .carousel-fade .carousel-inner .active {
          opacity: 1;
        }
        .landing-page .carousel-fade .carousel-inner .active.left,
        .landing-page .carousel-fade .carousel-inner .active.right {
          left: 0;
          opacity: 0;
          z-index: 1;
        }
        .landing-page .carousel-fade .carousel-inner .next.left,
        .landing-page .carousel-fade .carousel-inner .prev.right {
          opacity: 1;
        }
        .landing-page .carousel-fade .carousel-control {
          z-index: 2;
        }
        .landing-page .carousel-control.left,
        .landing-page .carousel-control.right {
          background: none;
        }
        .landing-page .carousel-control {
          width: 6%;
        }
        .landing-page .carousel-inner .container {
          position: relative;
        }
        .landing-page .carousel-inner {
          overflow: visible;
        }
        .landing-page .carousel-caption {
          position: absolute;
          top: 100px;
          left: 0;
          bottom: auto;
          right: auto;
          text-align: left;
        }
        .landing-page .carousel-caption {
          position: absolute;
          top: 100px;
          left: 0;
          bottom: auto;
          right: auto;
          text-align: left;
        }
        .landing-page .carousel-caption.blank {
          top: 140px;
        }
        .landing-page .carousel-image {
          position: absolute;
          right: 10px;
          top: 150px;
        }
        .landing-page .carousel-indicators {
          padding-right: 60px;
        }
        .landing-page .carousel-caption h1 {
          font-weight: 700;
          font-size: 38px;
          text-transform: uppercase;
          text-shadow: none;
          letter-spacing: -1.5px;
        }
        .landing-page .carousel-caption p {
          font-weight: 700;
          text-transform: uppercase;
          text-shadow: none;
        }
        .landing-page .caption-link {
          color: #fff;
          margin-left: 10px;
          text-transform: capitalize;
          font-weight: 400;
        }
        .landing-page .caption-link:hover {
          text-decoration: none;
          color: inherit;
        }
        .landing-page .services {
          padding-top: 60px;
        }
        .landing-page .services h2 {
          font-size: 20px;
          letter-spacing: -1px;
          font-weight: 600;
          text-transform: uppercase;
        }
        .landing-page .features-block {
          margin-top: 40px;
        }
        .landing-page .features-text {
          margin-top: 40px;
        }
        .landing-page .features small {
          color: #1ab394;
        }
        .landing-page .features h2 {
          font-size: 18px;
          margin-top: 5px;
        }
        .landing-page .features-text-alone {
          margin: 40px 0;
        }
        .landing-page .features-text-alone h1 {
          font-weight: 200;
        }
        .landing-page .features-icon {
          color: #1ab394;
          font-size: 40px;
        }
        .landing-page .navy-section {
          margin-top: 60px;
          background: #1ab394;
          color: #fff;
          padding: 20px 0;
        }
        .landing-page .gray-section {
          background: #f4f4f4;
          margin-top: 60px;
        }
        .landing-page .team-member {
          text-align: center;
        }
        .landing-page .team-member img {
          margin: auto;
        }
        .landing-page .social-icon a {
          background: #1ab394;
          color: #fff;
          padding: 4px 8px;
          height: 28px;
          width: 28px;
          display: block;
          border-radius: 50px;
        }
        .landing-page .social-icon a:hover {
          background: #179d82;
        }
        .landing-page .img-small {
          height: 88px;
          width: 88px;
        }
        .landing-page .pricing-plan {
          margin: 20px 30px 0 30px;
          border-radius: 4px;
        }
        .landing-page .pricing-plan.selected {
          transform: scale(1.1);
          background: #f4f4f4;
        }
        .landing-page .pricing-plan li {
          padding: 10px 16px;
          border-top: 1px solid #e7eaec;
          text-align: center;
          color: #aeaeae;
        }
        .landing-page .pricing-plan .pricing-price span {
          font-weight: 700;
          color: #1ab394;
        }
        .landing-page li.pricing-desc {
          font-size: 13px;
          border-top: none;
          padding: 20px 16px;
        }
        .landing-page li.pricing-title {
          background: #1ab394;
          color: #fff;
          padding: 10px;
          border-radius: 4px 4px 0 0;
          font-size: 22px;
          font-weight: 600;
        }
        .landing-page .testimonials {
          padding-top: 80px;
          padding-bottom: 90px;
          background-color: #1ab394;
          background-image: url('../img/landing/avatar_all.png');
        }
        .landing-page .big-icon {
          font-size: 56px !important;
        }
        .landing-page .features .big-icon {
          color: #1ab394 !important;
        }
        .landing-page .contact {
          background-image: url('../img/landing/word_map.png');
          background-position: 50% 50%;
          background-repeat: no-repeat;
          margin-top: 60px;
        }
        .landing-page section.timeline {
          padding-bottom: 30px;
        }
        .landing-page section.comments {
          padding-bottom: 80px;
        }
        .landing-page .comments-avatar {
          margin-top: 25px;
          margin-left: 22px;
          margin-bottom: 25px;
        }
        .landing-page .comments-avatar .commens-name {
          font-weight: 600;
          font-size: 14px;
        }
        .landing-page .comments-avatar img {
          width: 42px;
          height: 42px;
          border-radius: 50%;
          margin-right: 10px;
        }
        .landing-page .bubble {
          position: relative;
          height: 120px;
          padding: 20px;
          background: #FFFFFF;
          -webkit-border-radius: 10px;
          -moz-border-radius: 10px;
          border-radius: 10px;
          font-style: italic;
          font-size: 14px;
        }
        .landing-page .bubble:after {
          content: '';
          position: absolute;
          border-style: solid;
          border-width: 15px 14px 0;
          border-color: #FFFFFF transparent;
          display: block;
          width: 0;
          z-index: 1;
          bottom: -15px;
          left: 30px;
        }
        .landing-page .btn-primary.btn-outline:hover,
        .landing-page .btn-success.btn-outline:hover,
        .landing-page .btn-info.btn-outline:hover,
        .landing-page .btn-warning.btn-outline:hover,
        .landing-page .btn-danger.btn-outline:hover {
          color: #fff;
        }
        .landing-page .btn-primary {
          background-color: #1ab394;
          border-color: #1ab394;
          color: #FFFFFF;
          font-size: 14px;
          padding: 10px 20px;
          font-weight: 600;
        }
        .landing-page .btn-primary:hover,
        .landing-page .btn-primary:focus,
        .landing-page .btn-primary:active,
        .landing-page .btn-primary.active,
        .landing-page .open .dropdown-toggle.btn-primary {
          background-color: #179d82;
          border-color: #179d82;
          color: #FFFFFF;
        }
        .landing-page .btn-primary:active,
        .landing-page .btn-primary.active,
        .landing-page .open .dropdown-toggle.btn-primary {
          background-image: none;
        }
        .landing-page .btn-primary.disabled,
        .landing-page .btn-primary.disabled:hover,
        .landing-page .btn-primary.disabled:focus,
        .landing-page .btn-primary.disabled:active,
        .landing-page .btn-primary.disabled.active,
        .landing-page .btn-primary[disabled],
        .landing-page .btn-primary[disabled]:hover,
        .landing-page .btn-primary[disabled]:focus,
        .landing-page .btn-primary[disabled]:active,
        .landing-page .btn-primary.active[disabled],
        .landing-page fieldset[disabled] .btn-primary,
        .landing-page fieldset[disabled] .btn-primary:hover,
        .landing-page fieldset[disabled] .btn-primary:focus,
        .landing-page fieldset[disabled] .btn-primary:active,
        .landing-page fieldset[disabled] .btn-primary.active {
          background-color: #1dc5a3;
          border-color: #1dc5a3;
        }
        @media (min-width: 768px) {
          .landing-page {
            /* Navbar positioning foo */
            /* The navbar becomes detached from the top, so we round the corners */
            /* Bump up size of carousel content */
          }
          .landing-page .navbar-wrapper {
            margin-top: 20px;
          }
          .landing-page .navbar-wrapper .container {
            padding-right: 15px;
            padding-left: 15px;
          }
          .landing-page .navbar-wrapper .navbar {
            padding-right: 0;
            padding-left: 0;
          }
          .landing-page .navbar-wrapper .navbar {
            border-radius: 4px;
          }
          .landing-page .carousel-caption p {
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.4;
          }
          .landing-page .featurette-heading {
            font-size: 50px;
          }
        }
        @media (max-width: 992px) {
          .landing-page .carousel-image {
            display: none;
          }
        }
        @media (max-width: 768px) {
          .landing-page .carousel-caption,
          .landing-page .carousel-caption.blank {
            left: 5%;
            top: 80px;
          }
          .landing-page .carousel-caption h1 {
            font-size: 28px;
          }
          .landing-page .navbar.navbar-scroll .navbar-brand {
            margin-top: 6px;
          }
          .landing-page .navbar-default {
            background-color: #fff;
            border-color: #fff;
            padding: 15px 0;
          }
          .landing-page .navbar-default .navbar-nav > .active > a:focus {
            background: transparent;
            color: inherit;
          }
          .landing-page .navbar-default .nav li a {
            color: #676a6c;
          }
          .landing-page .navbar-default .nav li a:hover {
            color: #1ab394;
          }
          .landing-page .navbar-wrapper .navbar {
            padding-top: 0;
            padding-bottom: 5px;
            border-bottom: 1px solid #e7eaec;
            border-radius: 0;
          }
          .landing-page .nav > li > a {
            padding: 25px 10px 15px 10px;
          }
          .landing-page .navbar-nav > li > a {
            padding: 20px 10px;
          }
          .landing-page .navbar .navbar-brand {
            margin-top: 6px;
            border-radius: 5px;
            font-size: 12px;
            padding: 10px;
            height: auto;
          }
          .landing-page .navbar-wrapper .navbar {
            padding-left: 15px;
            padding-right: 5px;
          }
          .landing-page .navbar-default .navbar-nav > .active > a,
          .landing-page .navbar-default .navbar-nav > .active > a:hover {
            color: inherit;
          }
          .landing-page .carousel-control {
            display: none;
          }
        }
        @media (min-width: 992px) {
          .landing-page .featurette-heading {
            margin-top: 120px;
          }
        }
        @media (max-width: 768px) {
          .landing-page .navbar .navbar-header {
            display: block;
            float: none;
          }
          .landing-page .navbar .navbar-header .navbar-toggle {
            background-color: #ffffff;
            padding: 9px 10px;
            border: none;
          }
        }
        body.rtls {
          /* Theme config */
        }
        body.rtls #page-wrapper {
          margin: 0 220px 0 0;
        }
        body.rtls .nav-second-level li a {
          padding: 7px 35px 7px 10px;
        }
        body.rtls .ibox-title h5 {
          float: right;
        }
        body.rtls .pull-right {
          float: left !important;
        }
        body.rtls .pull-left {
          float: right !important;
        }
        body.rtls .ibox-tools {
          float: left;
        }
        body.rtls .stat-percent {
          float: left;
        }
        body.rtls .navbar-right {
          float: left !important;
        }
        body.rtls .navbar-top-links li:last-child {
          margin-left: 40px;
          margin-right: 0;
        }
        body.rtls .minimalize-styl-2 {
          float: right;
          margin: 14px 20px 5px 5px;
        }
        body.rtls .feed-element > .pull-left {
          margin-left: 10px;
          margin-right: 0;
        }
        body.rtls .timeline-item .date {
          text-align: left;
        }
        body.rtls .timeline-item .date i {
          left: 0;
          right: auto;
        }
        body.rtls .timeline-item .content {
          border-right: 1px solid #e7eaec;
          border-left: none;
        }
        body.rtls .theme-config {
          left: 0;
          right: auto;
        }
        body.rtls .spin-icon {
          border-radius: 0 20px 20px 0;
        }
        body.rtls .toast-close-button {
          float: left;
        }
        body.rtls #toast-container > .toast:before {
          margin: auto -1.5em auto 0.5em;
        }
        body.rtls #toast-container > div {
          padding: 15px 50px 15px 15px;
        }
        body.rtls .center-orientation .vertical-timeline-icon i {
          margin-left: 0;
          margin-right: -12px;
        }
        body.rtls .vertical-timeline-icon i {
          right: 50%;
          left: auto;
          margin-left: auto;
          margin-right: -12px;
        }
        body.rtls .file-box {
          float: right;
        }
        body.rtls ul.notes li {
          float: right;
        }
        body.rtls .chat-users,
        body.rtls .chat-statistic {
          margin-right: -30px;
          margin-left: auto;
        }
        body.rtls .dropdown-menu > li > a {
          text-align: right;
        }
        body.rtls .b-r {
          border-left: 1px solid #e7eaec;
          border-right: none;
        }
        body.rtls .dd-list .dd-list {
          padding-right: 30px;
          padding-left: 0;
        }
        body.rtls .dd-item > button {
          float: right;
        }
        body.rtls .theme-config-box {
          margin-left: -220px;
          margin-right: 0;
        }
        body.rtls .theme-config-box.show {
          margin-left: 0;
          margin-right: 0;
        }
        body.rtls .spin-icon {
          right: 0;
          left: auto;
        }
        body.rtls .skin-setttings {
          margin-right: 40px;
          margin-left: 0;
        }
        body.rtls .skin-setttings {
          direction: ltr;
        }
        body.rtls .footer.fixed {
          margin-right: 220px;
          margin-left: 0;
        }
        @media (max-width: 992px) {
          body.rtls .chat-users,
          body.rtls .chat-statistic {
            margin-right: 0;
          }
        }
        body.rtls.mini-navbar .footer.fixed,
        body.body-small.mini-navbar .footer.fixed {
          margin: 0 70px 0 0;
        }
        body.rtls.mini-navbar.fixed-sidebar .footer.fixed,
        body.body-small.mini-navbar .footer.fixed {
          margin: 0 0 0 0;
        }
        body.rtls.top-navigation .navbar-toggle {
          float: right;
          margin-left: 15px;
          margin-right: 15px;
        }
        .body-small.rtls.top-navigation .navbar-header {
          float: none;
        }
        body.rtls.top-navigation #page-wrapper {
          margin: 0;
        }
        body.rtls.mini-navbar #page-wrapper {
          margin: 0 70px 0 0;
        }
        body.rtls.mini-navbar.fixed-sidebar #page-wrapper {
          margin: 0 0 0 0;
        }
        body.rtls.body-small.fixed-sidebar.mini-navbar #page-wrapper {
          margin: 0 220px 0 0;
        }
        body.rtls.body-small.fixed-sidebar.mini-navbar .navbar-static-side {
          width: 220px;
        }
        .body-small.rtls .navbar-fixed-top {
          margin-right: 0;
        }
        .body-small.rtls .navbar-header {
          float: right;
        }
        body.rtls .navbar-top-links li:last-child {
          margin-left: 20px;
        }
        body.rtls .top-navigation #page-wrapper,
        body.rtls.mini-navbar .top-navigation #page-wrapper,
        body.rtls.mini-navbar.top-navigation #page-wrapper {
          margin: 0;
        }
        body.rtls .top-navigation .footer.fixed,
        body.rtls.top-navigation .footer.fixed {
          margin: 0;
        }
        @media (max-width: 768px) {
          body.rtls .navbar-top-links li:last-child {
            margin-left: 20px;
          }
          .body-small.rtls #page-wrapper {
            position: inherit;
            margin: 0 0 0 0;
            min-height: 1000px;
          }
          .body-small.rtls .navbar-static-side {
            display: none;
            z-index: 2001;
            position: absolute;
            width: 70px;
          }
          .body-small.rtls.mini-navbar .navbar-static-side {
            display: block;
          }
          .rtls.fixed-sidebar.body-small .navbar-static-side {
            display: none;
            z-index: 2001;
            position: fixed;
            width: 220px;
          }
          .rtls.fixed-sidebar.body-small.mini-navbar .navbar-static-side {
            display: block;
          }
        }
        .rtls .ltr-support {
          direction: ltr;
        }
        .rtls.mini-navbar .nav-second-level,
        .rtls.mini-navbar li.active .nav-second-level {
          left: auto;
          right: 70px;
        }
        .rtls #right-sidebar {
          left: -260px;
          right: auto;
        }
        .rtls #right-sidebar.sidebar-open {
          left: 0;
        }
        /*
         *
         *   This is style for skin config
         *   Use only in demo theme
         *
        */
        .theme-config {
          position: absolute;
          top: 90px;
          right: 0;
          overflow: hidden;
        }
        .theme-config-box {
          margin-right: -220px;
          position: relative;
          z-index: 2000;
          transition-duration: 0.8s;
        }
        .theme-config-box.show {
          margin-right: 0;
        }
        .spin-icon {
          background: #1ab394;
          position: absolute;
          padding: 7px 10px 7px 13px;
          border-radius: 20px 0 0 20px;
          font-size: 16px;
          top: 0;
          left: 0;
          width: 40px;
          color: #fff;
          cursor: pointer;
        }
        .skin-setttings {
          width: 220px;
          margin-left: 40px;
          background: #f3f3f4;
        }
        .skin-setttings .title {
          background: #efefef;
          text-align: center;
          text-transform: uppercase;
          font-weight: 600;
          display: block;
          padding: 10px 15px;
          font-size: 12px;
        }
        .setings-item {
          padding: 10px 30px;
        }
        .setings-item.skin {
          text-align: center;
        }
        .setings-item .switch {
          float: right;
        }
        .skin-name a {
          text-transform: uppercase;
        }
        .setings-item a {
          color: #fff;
        }
        .default-skin,
        .blue-skin,
        .ultra-skin,
        .yellow-skin {
          text-align: center;
        }
        .default-skin {
          font-weight: 600;
          background: #283A49;
        }
        .default-skin:hover {
          background: #1e2e3d;
        }
        .blue-skin {
          font-weight: 600;
          background: url("patterns/header-profile-skin-1.png") repeat scroll 0 0;
        }
        .blue-skin:hover {
          background: #0d8ddb;
        }
        .yellow-skin {
          font-weight: 600;
          background: url("patterns/header-profile-skin-3.png") repeat scroll 0 100%;
        }
        .yellow-skin:hover {
          background: #ce8735;
        }
        .ultra-skin {
          padding: 20px 10px;
          font-weight: 600;
          background: url("patterns/3.png") repeat scroll 0 0;
        }
        .ultra-skin:hover {
          background: url("patterns/4.png") repeat scroll 0 0;
        }
        /*
         *
         *   SKIN 1 - INSPINIA - Responsive Admin Theme
         *   NAME - Blue light
         *
        */
        .skin-1 .minimalize-styl-2 {
          margin: 14px 5px 5px 30px;
        }
        .skin-1 .navbar-top-links li:last-child {
          margin-right: 30px;
        }
        .skin-1.fixed-nav .minimalize-styl-2 {
          margin: 14px 5px 5px 15px;
        }
        .skin-1 .spin-icon {
          background: #0e9aef !important;
        }
        .skin-1 .nav-header {
          background-color: #0e9aef;
          background-image: url('patterns/header-profile-skin-1.png');
        }
        .skin-1.mini-navbar .nav-second-level {
          background: #3e495f;
        }
        .skin-1 .breadcrumb {
          background: transparent;
        }
        .skin-1 .page-heading {
          border: none;
        }
        .skin-1 .nav > li.active {
          background: #3a4459;
        }
        .skin-1 .nav > li > a {
          color: #9ea6b9;
        }
        .skin-1 .nav > li.active > a {
          color: #fff;
        }
        .skin-1 .navbar-minimalize {
          background: #0e9aef;
          border-color: #0e9aef;
        }
        body.skin-1 {
          background: #3e495f;
        }
        .skin-1 .navbar-static-top {
          background: #ffffff;
        }
        .skin-1 .dashboard-header {
          background: transparent;
          border-bottom: none !important;
          border-top: none;
          padding: 20px 30px 10px 30px;
        }
        .fixed-nav.skin-1 .navbar-fixed-top {
          background: #fff;
        }
        .skin-1 .wrapper-content {
          padding: 30px 15px;
        }
        .skin-1 #page-wrapper {
          background: #f4f6fa;
        }
        .skin-1 .ibox-title,
        .skin-1 .ibox-content {
          border-width: 1px;
        }
        .skin-1 .ibox-content:last-child {
          border-style: solid solid solid solid;
        }
        .skin-1 .nav > li.active {
          border: none;
        }
        .skin-1 .nav-header {
          padding: 35px 25px 25px 25px;
        }
        .skin-1 .nav-header a.dropdown-toggle {
          color: #fff;
          margin-top: 10px;
        }
        .skin-1 .nav-header a.dropdown-toggle .text-muted {
          color: #fff;
          opacity: 0.8;
        }
        .skin-1 .profile-element {
          text-align: center;
        }
        .skin-1 .img-circle {
          border-radius: 5px;
        }
        .skin-1 .navbar-default .nav > li > a:hover,
        .skin-1 .navbar-default .nav > li > a:focus {
          background: #3a4459;
          color: #fff;
        }
        .skin-1 .nav.nav-tabs > li.active > a {
          color: #555;
        }
        .skin-1 .nav.nav-tabs > li.active {
          background: transparent;
        }
        /*
         *
         *   SKIN 2 - INSPINIA - Responsive Admin Theme
         *   NAME - Inspinia Ultra
         *
        */
        body.skin-2 {
          color: #565758 !important;
        }
        .skin-2 .minimalize-styl-2 {
          margin: 14px 5px 5px 25px;
        }
        .skin-2 .navbar-top-links li:last-child {
          margin-right: 25px;
        }
        .skin-2 .spin-icon {
          background: #23c6c8 !important;
        }
        .skin-2 .nav-header {
          background-color: #23c6c8;
          background-image: url('patterns/header-profile-skin-2.png');
        }
        .skin-2.mini-navbar .nav-second-level {
          background: #ededed;
        }
        .skin-2 .breadcrumb {
          background: transparent;
        }
        .skin-2.fixed-nav .minimalize-styl-2 {
          margin: 14px 5px 5px 15px;
        }
        .skin-2 .page-heading {
          border: none;
          background: rgba(255, 255, 255, 0.7);
        }
        .skin-2 .nav > li.active {
          background: #e0e0e0;
        }
        .skin-2 .logo-element {
          padding: 17px 0;
        }
        .skin-2 .nav > li > a,
        .skin-2 .welcome-message {
          color: #edf6ff;
        }
        .skin-2 #top-search::-moz-placeholder {
          color: #edf6ff;
          opacity: 0.5;
        }
        .skin-2 #side-menu > li > a,
        .skin-2 .nav.nav-second-level > li > a {
          color: #586b7d;
        }
        .skin-2 .nav > li.active > a {
          color: #213a53;
        }
        .skin-2.mini-navbar .nav-header {
          background: #213a53;
        }
        .skin-2 .navbar-minimalize {
          background: #23c6c8;
          border-color: #23c6c8;
        }
        .skin-2 .border-bottom {
          border-bottom: none !important;
        }
        .skin-2 #top-search {
          color: #fff;
        }
        body.skin-2 #wrapper {
          background-color: #ededed;
        }
        .skin-2 .navbar-static-top {
          background: #213a53;
        }
        .fixed-nav.skin-2 .navbar-fixed-top {
          background: #213a53;
          border-bottom: none !important;
        }
        .skin-2 .nav-header {
          padding: 30px 25px 30px 25px;
        }
        .skin-2 .dashboard-header {
          background: rgba(255, 255, 255, 0.4);
          border-bottom: none !important;
          border-top: none;
          padding: 20px 30px 20px 30px;
        }
        .skin-2 .wrapper-content {
          padding: 30px 15px;
        }
        .skin-2 .dashoard-1 .wrapper-content {
          padding: 0 30px 25px 30px;
        }
        .skin-2 .ibox-title {
          background: rgba(255, 255, 255, 0.7);
          border: none;
          margin-bottom: 1px;
        }
        .skin-2 .ibox-content {
          background: rgba(255, 255, 255, 0.4);
          border: none !important;
        }
        .skin-2 #page-wrapper {
          background: #f6f6f6;
          background: -webkit-radial-gradient(center, ellipse cover, #f6f6f6 20%, #d5d5d5 100%);
          background: -o-radial-gradient(center, ellipse cover, #f6f6f6 20%, #d5d5d5 100%);
          background: -ms-radial-gradient(center, ellipse cover, #f6f6f6 20%, #d5d5d5 100%);
          background: radial-gradient(ellipse at center, #f6f6f6 20%, #d5d5d5 100%);
          -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#f6f6f6, endColorstr=#d5d5d5)";
        }
        .skin-2 .ibox-title,
        .skin-2 .ibox-content {
          border-width: 1px;
        }
        .skin-2 .ibox-content:last-child {
          border-style: solid solid solid solid;
        }
        .skin-2 .nav > li.active {
          border: none;
        }
        .skin-2 .nav-header a.dropdown-toggle {
          color: #edf6ff;
          margin-top: 10px;
        }
        .skin-2 .nav-header a.dropdown-toggle .text-muted {
          color: #edf6ff;
          opacity: 0.8;
        }
        .skin-2 .img-circle {
          border-radius: 10px;
        }
        .skin-2 .nav.navbar-top-links > li > a:hover,
        .skin-2 .nav.navbar-top-links > li > a:focus {
          background: #1a2d41;
        }
        .skin-2 .navbar-default .nav > li > a:hover,
        .skin-2 .navbar-default .nav > li > a:focus {
          background: #e0e0e0;
          color: #213a53;
        }
        .skin-2 .nav.nav-tabs > li.active > a {
          color: #555;
        }
        .skin-2 .nav.nav-tabs > li.active {
          background: transparent;
        }
        /*
         *
         *   SKIN 3 - INSPINIA - Responsive Admin Theme
         *   NAME - Yellow/purple
         *
        */
        .skin-3 .minimalize-styl-2 {
          margin: 14px 5px 5px 30px;
        }
        .skin-3 .navbar-top-links li:last-child {
          margin-right: 30px;
        }
        .skin-3.fixed-nav .minimalize-styl-2 {
          margin: 14px 5px 5px 15px;
        }
        .skin-3 .spin-icon {
          background: #ecba52 !important;
        }
        body.boxed-layout.skin-3 #wrapper {
          background: #3e2c42;
        }
        .skin-3 .nav-header {
          background-color: #ecba52;
          background-image: url('patterns/header-profile-skin-3.png');
        }
        .skin-3.mini-navbar .nav-second-level {
          background: #3e2c42;
        }
        .skin-3 .breadcrumb {
          background: transparent;
        }
        .skin-3 .page-heading {
          border: none;
        }
        .skin-3 .nav > li.active {
          background: #38283c;
        }
        .fixed-nav.skin-3 .navbar-fixed-top {
          background: #fff;
        }
        .skin-3 .nav > li > a {
          color: #948b96;
        }
        .skin-3 .nav > li.active > a {
          color: #fff;
        }
        .skin-3 .navbar-minimalize {
          background: #ecba52;
          border-color: #ecba52;
        }
        body.skin-3 {
          background: #3e2c42;
        }
        .skin-3 .navbar-static-top {
          background: #ffffff;
        }
        .skin-3 .dashboard-header {
          background: transparent;
          border-bottom: none !important;
          border-top: none;
          padding: 20px 30px 10px 30px;
        }
        .skin-3 .wrapper-content {
          padding: 30px 15px;
        }
        .skin-3 #page-wrapper {
          background: #f4f6fa;
        }
        .skin-3 .ibox-title,
        .skin-3 .ibox-content {
          border-width: 1px;
        }
        .skin-3 .ibox-content:last-child {
          border-style: solid solid solid solid;
        }
        .skin-3 .nav > li.active {
          border: none;
        }
        .skin-3 .nav-header {
          padding: 35px 25px 25px 25px;
        }
        .skin-3 .nav-header a.dropdown-toggle {
          color: #fff;
          margin-top: 10px;
        }
        .skin-3 .nav-header a.dropdown-toggle .text-muted {
          color: #fff;
          opacity: 0.8;
        }
        .skin-3 .profile-element {
          text-align: center;
        }
        .skin-3 .img-circle {
          border-radius: 5px;
        }
        .skin-3 .navbar-default .nav > li > a:hover,
        .skin-3 .navbar-default .nav > li > a:focus {
          background: #38283c;
          color: #fff;
        }
        .skin-3 .nav.nav-tabs > li.active > a {
          color: #555;
        }
        .skin-3 .nav.nav-tabs > li.active {
          background: transparent;
        }
        body.md-skin {
          font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
          background-color: #ffffff;
        }
        .md-skin .nav-header {
          background: url("patterns/4.png") no-repeat;
        }
        .md-skin .label,
        .md-skin .badge {
          font-family: 'Roboto';
        }
        .md-skin .font-bold {
          font-weight: 500;
        }
        .md-skin .wrapper-content {
          padding: 30px 20px 40px;
        }
        @media (max-width: 768px) {
          .md-skin .wrapper-content {
            padding: 30px 0 40px;
          }
        }
        .md-skin .page-heading {
          border-bottom: none !important;
          border-top: 0;
          padding: 0 10px 20px 10px;
          box-shadow: 0 1px 1px -1px rgba(0, 0, 0, 0.34), 0 0 6px 0 rgba(0, 0, 0, 0.14);
        }
        .md-skin .full-height-layout .page-heading {
          border-bottom: 1px solid #e7eaec !important;
        }
        .md-skin .ibox {
          clear: both;
          margin-bottom: 25px;
          margin-top: 0;
          padding: 0;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        .md-skin .ibox.border-bottom {
          border-bottom: none !important;
        }
        .md-skin .ibox-title,
        .md-skin .ibox-content {
          border-style: none;
        }
        .md-skin .ibox-title h5 {
          font-size: 16px;
          font-weight: 400;
        }
        .md-skin a.close-canvas-menu {
          color: #ffffff;
        }
        .md-skin .welcome-message {
          color: #ffffff;
          font-weight: 300;
        }
        .md-skin #top-search::-moz-placeholder {
          color: #ffffff;
        }
        .md-skin #top-search::-webkit-input-placeholder {
          color: #ffffff;
        }
        .md-skin #nestable-output,
        .md-skin #nestable2-output {
          font-family: 'Roboto', lucida grande, lucida sans unicode, helvetica, arial, sans-serif;
        }
        .md-skin .landing-page {
          font-family: 'Roboto', helvetica, arial, sans-serif;
        }
        .md-skin .landing-page.navbar-default.navbar-scroll {
          background-color: #fff !important;
        }
        .md-skin .landing-page.navbar-default {
          background-color: transparent !important;
          box-shadow: none;
        }
        .md-skin .landing-page.navbar-default .nav li a {
          font-family: 'Roboto', helvetica, arial, sans-serif;
        }
        .md-skin .nav > li > a {
          color: #676a6c;
          padding: 14px 20px 14px 25px;
        }
        .md-skin .nav.navbar-right > li > a {
          color: #ffffff;
        }
        .md-skin .nav > li.active > a {
          color: #5b5d5f;
          font-weight: 700;
        }
        .md-skin .navbar-default .nav > li > a:hover,
        .md-skin .navbar-default .nav > li > a:focus {
          font-weight: 700;
          color: #5b5d5f;
        }
        .md-skin .nav .open > a,
        .md-skin .nav .open > a:hover,
        .md-skin .nav .open > a:focus {
          background: #1ab394;
        }
        .md-skin .navbar-top-links li {
          display: inline-table;
        }
        .md-skin .navbar-top-links .dropdown-menu li {
          display: block;
        }
        .md-skin .pace-done .nav-header {
          transition: all 0.4s;
        }
        .md-skin .nav > li.active {
          background: #f8f8f9;
        }
        .md-skin .nav-second-level li a {
          padding: 7px 10px 7px 52px;
        }
        .md-skin .navbar-top-links li a {
          padding: 20px 10px;
          min-height: 50px;
        }
        .md-skin .nav > li > a {
          font-weight: 400;
        }
        .md-skin .navbar-static-side .nav > li > a:focus,
        .md-skin .navbar-static-side .nav > li > a:hover {
          background-color: inherit;
        }
        .md-skin .navbar-top-links .dropdown-menu li a {
          padding: 3px 20px;
          min-height: inherit;
        }
        .md-skin .nav-header .navbar-fixed-top a {
          color: #ffffff;
        }
        .md-skin .nav-header .text-muted {
          color: #ffffff;
        }
        .md-skin .navbar-form-custom .form-control {
          font-weight: 300;
        }
        .md-skin .mini-navbar .nav-second-level {
          background-color: inherit;
        }
        .md-skin .mini-navbar li.active .nav-second-level {
          left: 65px;
        }
        .md-skin .canvas-menu.mini-navbar .nav-second-level {
          background: inherit;
        }
        .md-skin .pace-done .navbar-static-side,
        .md-skin .pace-done .nav-header,
        .md-skin .pace-done li.active,
        .md-skin .pace-done #page-wrapper,
        .md-skin .pace-done .footer {
          -webkit-transition: all 0.4s;
          -moz-transition: all 0.4s;
          -o-transition: all 0.4s;
          transition: all 0.4s;
        }
        .md-skin .navbar-fixed-top {
          background: #fff;
          transition-duration: 0.4s;
          z-index: 2030;
          border-bottom: none !important;
        }
        .md-skin .navbar-fixed-top,
        .md-skin .navbar-static-top {
          background-color: #1ab394 !important;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        .md-skin .navbar-static-side {
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        .md-skin #right-sidebar {
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
          border: none;
          z-index: 900;
        }
        .md-skin .white-bg .navbar-fixed-top,
        .md-skin .white-bg .navbar-static-top {
          background: #fff !important;
        }
        .md-skin .contact-box {
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
          border: none;
        }
        .md-skin .dashboard-header {
          border-bottom: none !important;
          border-top: 0;
          padding: 20px 20px 20px 20px;
          margin: 30px 20px 0 20px;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        @media (max-width: 768px) {
          .md-skin .dashboard-header {
            margin: 20px 0 0 0;
          }
        }
        .md-skin ul.notes li div {
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        .md-skin .file {
          border: none;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        .md-skin .mail-box {
          background-color: #ffffff;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
          padding: 0;
          margin-bottom: 20px;
          border: none;
        }
        .md-skin .mail-box-header {
          border: none;
          background-color: #ffffff;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
          padding: 30px 20px 20px 20px;
        }
        .md-skin .mailbox-content {
          border: none;
          padding: 20px;
          background: #ffffff;
        }
        .md-skin .social-feed-box {
          border: none;
          background: #fff;
          margin-bottom: 15px;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        .md-skin.landing-page .navbar-default {
          background-color: transparent !important;
          border-color: transparent;
          transition: all 0.3s ease-in-out 0s;
          box-shadow: none;
        }
        .md-skin.landing-page .navbar-default.navbar-scroll,
        .md-skin.landing-page.body-small .navbar-default {
          background-color: #ffffff !important;
        }
        .md-skin.landing-page .nav > li.active {
          background: inherit;
        }
        .md-skin.landing-page .navbar-scroll .navbar-nav > li > a {
          padding: 20px 10px;
        }
        .md-skin.landing-page .navbar-default .nav li a {
          font-family: 'Roboto', helvetica, arial, sans-serif;
        }
        .md-skin.landing-page .nav > li > a {
          padding: 25px 10px 15px 10px;
        }
        .md-skin.landing-page .navbar-default .navbar-nav > li > a:hover,
        .md-skin.landing-page .navbar-default .navbar-nav > li > a:focus {
          background: inherit;
          color: #1ab394;
        }
        .md-skin.landing-page.body-small .nav.navbar-right > li > a {
          color: #676a6c;
        }
        .md-skin .landing_link a,
        .md-skin .special_link a {
          color: #ffffff !important;
        }
        .md-skin.canvas-menu.mini-navbar .nav-second-level {
          background: #f8f8f9;
        }
        .md-skin.mini-navbar .nav-second-level {
          background-color: #ffffff;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        .md-skin.mini-navbar .nav-second-level li a {
          padding-left: 0;
        }
        .md-skin.mini-navbar.fixed-sidebar .nav-second-level li a {
          padding-left: 52px;
        }
        .md-skin.top-navigation .nav.navbar-right > li > a {
          padding: 15px 20px;
          color: #676a6c;
        }
        .md-skin.top-navigation .nav > li a:hover,
        .md-skin .top-navigation .nav > li a:focus,
        .md-skin.top-navigation .nav .open > a,
        .md-skin.top-navigation .nav .open > a:hover,
        .md-skin.top-navigation .nav .open > a:focus {
          color: #1ab394;
          background: #ffffff;
        }
        .md-skin.top-navigation .nav > li.active a {
          color: #1ab394;
          background: #ffffff;
        }
        .md-skin.fixed-nav #wrapper.top-navigation #page-wrapper {
          margin-top: 0;
        }
        .md-skin.fixed-sidebar.mini-navbar .navbar-static-side {
          width: 0;
        }
        .md-skin.fixed-sidebar.mini-navbar #page-wrapper {
          margin: 0 0 0 0;
        }
        .md-skin.body-small.fixed-sidebar.mini-navbar #page-wrapper {
          margin: 0 0 0 0;
        }
        .md-skin.body-small.fixed-sidebar.mini-navbar .navbar-static-side {
          width: 220px;
          background-color: #ffffff;
        }
        .md-skin.boxed-layout #wrapper {
          background-color: #ffffff;
        }
        .md-skin.canvas-menu nav.navbar-static-side {
          z-index: 2001;
          background: #ffffff;
          height: 100%;
          position: fixed;
          display: none;
        }
        @media (min-width: 768px) {
          #page-wrapper {
            position: inherit;
            margin: 0 0 0 220px;
            min-height: 1200px;
          }
          .navbar-static-side {
            z-index: 2001;
            position: absolute;
            width: 220px;
          }
          .navbar-top-links .dropdown-messages,
          .navbar-top-links .dropdown-tasks,
          .navbar-top-links .dropdown-alerts {
            margin-left: auto;
          }
        }
        @media (max-width: 768px) {
          #page-wrapper {
            position: inherit;
            margin: 0 0 0 0;
            min-height: 1000px;
          }
          .body-small .navbar-static-side {
            display: none;
            z-index: 2001;
            position: absolute;
            width: 70px;
          }
          .body-small.mini-navbar .navbar-static-side {
            display: block;
          }
          .lock-word {
            display: none;
          }
          .navbar-form-custom {
            display: none;
          }
          .navbar-header {
            display: inline;
            float: left;
          }
          .sidebard-panel {
            z-index: 2;
            position: relative;
            width: auto;
            min-height: 100% !important;
          }
          .sidebar-content .wrapper {
            padding-right: 0;
            z-index: 1;
          }
          .fixed-sidebar.body-small .navbar-static-side {
            display: none;
            z-index: 2001;
            position: fixed;
            width: 220px;
          }
          .fixed-sidebar.body-small.mini-navbar .navbar-static-side {
            display: block;
          }
          .ibox-tools {
            float: none;
            text-align: right;
            display: block;
          }
          .navbar-static-side {
            display: none;
          }
          body:not(.mini-navbar) {
            -webkit-transition: background-color 500ms linear;
            -moz-transition: background-color 500ms linear;
            -o-transition: background-color 500ms linear;
            -ms-transition: background-color 500ms linear;
            transition: background-color 500ms linear;
            background-color: #f3f3f4;
          }
        }
        @media (max-width: 350px) {
          .timeline-item .date {
            text-align: left;
            width: 110px;
            position: relative;
            padding-top: 30px;
          }
          .timeline-item .date i {
            position: absolute;
            top: 0;
            left: 15px;
            padding: 5px;
            width: 30px;
            text-align: center;
            border: 1px solid #e7eaec;
            background: #f8f8f8;
          }
          .timeline-item .content {
            border-left: none;
            border-top: 1px solid #e7eaec;
            padding-top: 10px;
            min-height: 100px;
          }
          .nav.navbar-top-links li.dropdown {
            display: none;
          }
          .ibox-tools {
            float: none;
            text-align: left;
            display: inline-block;
          }
        }
        /* Only demo */
        @media (max-width: 1000px) {
          .welcome-message {
            display: none;
          }
        }
        @media print {
          nav.navbar-static-side {
            display: none;
          }
          body {
            overflow: visible !important;
          }
          #page-wrapper {
            margin: 0;
          }
        }
    </style>

</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <img  class="logo-name" src="<?php echo base_url('assets/img/logo/juventud.png'); ?>" width="300" height="110" >
            </div>
            <h3>Bienvenido</h3>           
            <p>Iniciar Sesión</p>
            <form class="m-t" role="form" action="<?php echo base_url()?>login_ctrl/autentificarUser" method="POST">
                <div class="form-group">                    
                    <input type="text" name="rfc" id="rfc" class="form-control" placeholder="RFC" required="">
                </div>
                <div class="form-group">                
                    <input type="password" name="password" id="nombre" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b"><span class="glyphicon glyphicon-log-in"></span> Login</button>                                
            </form>
            <p class="error"> <?php echo $error ?> </p>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.1.js'); ?> "></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?> "></script>

</body>

</html>
