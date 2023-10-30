<div class="row my-4">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Review</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user) 
                        <tr>
                            <td>
                                <div class="px-3 py-1">
                                    
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{$user['name']}}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm text-secondary mb-0">{{$user['role']}}</p>
                            </td>
                            <td>
                                <span class="badge badge-dot me-4">
                                    <i class="bg-info"></i>
                                    <span class="text-dark text-xs">Đang hoạt động</span>
                                </span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <p class="text-secondary mb-0 text-sm">{{$user['email']}}</p>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-sm">{{$user['created_at']}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-sm">{{$user['id']}}</span>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>