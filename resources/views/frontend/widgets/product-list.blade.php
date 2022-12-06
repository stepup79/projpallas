<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10">
			<h4 class="ltext-103 cl5 text-white">
				Sản phẩm
			</h4>
		</div>

		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					Tất cả
				</button>																			
				@foreach($danhsachloai as $loai)										
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".loai-{{ $loai->l_id }}">
							{{ $loai->l_ten }}
						</button>
				@endforeach									
			</div>			
		</div>

		<div class="row isotope-grid">
			@foreach($data as $index=>$sp)
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item loai-{{ $sp->l_id }}">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" alt="IMG-PRODUCT">

						<a href="{{ route('frontend.productDetail', ['id' => $sp->sp_id]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal" data-sp-id="{{ $sp->sp_id }}">
							Xem ngay
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="{{ route('frontend.productDetail', ['id' => $sp->sp_id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								{{ $sp->sp_ten }}
							</a>

							<span class="stext-105 cl3">
								<% {{ $sp->sp_gia }} | number:0 %><u>đ</u>
							</span>
						</div>                        
					</div>
				</div>

				<!-- Modal quick view -->
				@include('frontend.widgets.product-quick-view', ['sp' => $sp, 'hinhanhlienquan' => $danhsachhinhanhlienquan])
			</div>
			@endforeach
		</div>
	</div>
</section>