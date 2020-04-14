@extends('errors::minimal')

@section('title', __('Access Denied'))
@section('code', '405')
@section('message', __($exception->getMessage() ?: 'Access Denied'))
