@extends('errors::minimal')

@section('title', __($exception->getMessage() ?: 'Found'))
@section('code', '302')
{{-- @section('message', __('Inappropriate Query')) --}}
@section('message', __($exception->getMessage() ?: 'Found'))
