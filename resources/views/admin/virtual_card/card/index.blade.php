@extends('admin.layouts.master')
@section('page_title', __('Card Lists'))
@section('content')
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>@lang('Card Lists')</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active">
						<a href="{{ route('admin.home') }}">@lang('Dashboard')</a>
					</div>
					<div class="breadcrumb-item">@lang('Card Lists')</div>
				</div>
			</div>
			<div class="row mb-3">
				<div class="container-fluid" id="container-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<div class="card mb-4 card-primary shadow-sm">
								<div
									class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">@lang('Search')</h6>
								</div>
								<div class="card-body">
									<form action="{{ route('admin.virtual.cardList') }}" method="get">
										@include('admin.virtual_card.card.searchForm')
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card mb-4 card-primary shadow">
								<div
									class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">@lang('Card Lists')</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table align-items-center table-bordered"
											   id="payment-method-table">
											<thead class="thead-light">
											<tr>
												<th col="scope">@lang('SL.')</th>
												<th col="scope">@lang('User')</th>
												<th col="scope">@lang('Provider')</th>
												<th col="scope">@lang('Card Number')</th>
												<th col="scope">@lang('Currency')</th>
												<th col="scope">@lang('Balance')</th>
												<th col="scope">@lang('Brand')</th>
												<th col="scope">@lang('Expiry Date')</th>
												<th col="scope">@lang('Status')</th>
												<th scope="col">@lang('More')</th>
											</tr>
											</thead>
											<tbody id="sortable">
											@if(count($cardLists) > 0)
												@foreach($cardLists as $key => $item)
													<tr>
														<td data-label="@lang('SL.')">{{ ++$key }} </td>
														<td data-label="@lang('User')">
															<a href="{{ route('user.edit', $item->user_id)}}"
															   class="text-decoration-none">
																<div class="d-lg-flex d-block align-items-center ">
																	<div class="mr-3"><img
																			src="{{ optional($item->user)->profilePicture()??asset('assets/upload/boy.png') }}"
																			alt="user"
																			class="rounded-circle" width="35"
																			data-toggle="tooltip" title=""
																			data-original-title="{{optional($item->user)->name?? __('N/A')}}">
																	</div>
																	<div
																		class="d-inline-flex d-lg-block align-items-center">
																		<p class="text-dark mb-0 font-16 font-weight-medium">{{Str::limit(optional($item->user)->name?? __('N/A'),20)}}</p>
																		<span
																			class="text-muted font-14 ml-1">{{ '@'.optional($item->user)->username?? __('N/A')}}</span>
																	</div>
																</div>
															</a>
														</td>
														<td data-label="@lang('Provider')">{{ optional($item->cardMethod)->name }} </td>
														<td data-label="@lang('Card Number')">{{ $item->card_number }} </td>
														<td data-label="@lang('Currency')">{{ $item->currency }} </td>
														<td data-label="@lang('Balance')">{{ $item->balance }} {{ $item->currency }}</td>
														<td data-label="@lang('Brand')">{{ $item->brand }} </td>
														<td data-label="@lang('Expiry Date')">{{ $item->expiry_date }} </td>
														<td data-label="@lang('Status')"><?php echo $item->statusMessage; ?> </td>
														<td data-label="@lang('More')">
															<a href="{{route('admin.virtual.cardView',$item->id)}}"
															   class="btn btn-outline-primary btn-sm" title="view"><i
																	class="fas fa-eye"></i></a>
															<a href="{{route('admin.virtual.cardTransaction',$item->id)}}"
															   class="btn btn-outline-primary btn-sm"
															   title="transaction"><i
																	class="fas fa-chart-line"></i></a>
														</td>
													</tr>
												@endforeach
											@else
												<tr>
													<td class="text-center text-danger" colspan="10">
														@lang('No Data Found')
													</td>
												</tr>
											@endif
											</tbody>
										</table>
									</div>
									<div class="card-footer">
										{{ $cardLists->links() }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>
	</div>
@endsection

@section('scripts')
	<script>
		'use strict'
	</script>
@endsection
