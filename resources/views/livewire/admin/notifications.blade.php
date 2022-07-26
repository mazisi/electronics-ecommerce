<div class="dropdown notifications">
    <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
        <i class="icofont-alarm fs-5"></i>
        <span class="pulse-ring"></span>
    </a>
    <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3">
        <div class="card border-0 w380">
            <div class="card-header border-0 p-3">
                <h5 class="mb-0 font-weight-light d-flex justify-content-between">
                    <span>Notifications</span>
                    <span wire:loading.remove wire:target='updateNotificationStatus' class="badge text-white">{{ $notifications->count() }}</span>
                </h5><span wire:loading wire:target='updateNotificationStatus' class="badge text-white"><i class="fa fa-spinner fa-spin "></i></span>
            </div>
            <div class="tab-content card-body">
                <div class="tab-pane fade show active">
                    <ul class="list-unstyled list mb-0">
                        @forelse ($notifications as $notification)
                        <li class="py-2 mb-1 border-bottom">
                            <a wire:click="updateNotificationStatus('{{ $notification->id }}')" href="#!" class="d-flex">
                                <img class="avatar rounded-circle" src="{{ asset('dashboard/assets/images/xs/avatar1.svg') }}" alt="">
                                <div class="flex-fill ms-2">
                                    <p class="d-flex justify-content-between mb-0 ">
                                        <span class="font-weight-bold">{{ $notification->body }}</span></p>
                                    <span class="">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        </li>
                        @empty
                            <p class="text-center">Empty.</p>
                        @endforelse
                        
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>