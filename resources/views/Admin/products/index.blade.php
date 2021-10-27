@extends('Admin.products.main')
@section('section')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Size</th>
                            <th>Category</th>
                            <th class="text-right no-sort">Action</th>
                        </tr>
                    </thead>
                    <?php $count = 0; ?>
                    <tbody id="data">
                        @foreach ($products as $product)
                        <tr>
                            <td><?php $count++; echo $count; ?></td>
                            <td>
                                <a href="profile.html" class="avatar"><img width="80" alt="" src="{{ asset('backend/img/products/'.$product->Image) }}"></a>
                            </td>
                            <td>{{ $product->ProductName }}</td>
                            <td>{{ $product->Price }}</td>
                            <td>{{ $product->Discount }}</td>
                            <td>@foreach ($product->product_size as $a)
                                <button><?php echo $a->sizes->Number ?></button>
                            @endforeach</td>
                            <td>{{ $product->category->CategoryName }}</td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item btn-edit-product" href="#" data-id="{{ $product->ProductID }}" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item btn-delete-product" data-id="{{ $product->ProductID }}" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection