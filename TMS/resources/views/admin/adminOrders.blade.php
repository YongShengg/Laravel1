@extends('admin.adminLayout')
@section('title', 'Home')
@section('content')

<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header"><strong>Table Price Quote</strong></div>
            <div class="card-body">
                <p class="text-medium-emphasis small">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap.</p>
                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-557">
                        <table class="table" id="orderTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#ORDER ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Progress Status</th>
                                    <th scope="col">Price Quote Status</th>
                                    <th scope="col">Payment Progress</th>
                                    <th scope="col">Create Date</th>
                                    <th scope="col">More</th>
                                    <th scope="col">Reject</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                
                                <div id="paginationLinks"></div>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmRejectModal" tabindex="-1" role="dialog" aria-labelledby="confirmRejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirmRejectModalLabel">Confirm Rejection <span id="orderIdPlaceholder"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to reject this order?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="confirmRejectBtn">Reject</button>
        </div>
        </div>
    </div>
</div>

@endsection