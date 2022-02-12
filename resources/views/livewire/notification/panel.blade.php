<div class="relative">
    <div>
        <div wire:click="togglePanel" class="cursor-pointer notification-dropdown text-center notification-button"
             style="width:40px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path class="heroicon-ui"
                      d="M15 19a3 3 0 0 1-6 0H4a1 1 0 0 1 0-2h1v-6a7 7 0 0 1 4.02-6.34 3 3 0 0 1 5.96 0A7 7 0 0 1 19 11v6h1a1 1 0 0 1 0 2h-5zm-4 0a1 1 0 0 0 2 0h-2zm0-12.9A5 5 0 0 0 7 11v6h10v-6a5 5 0 0 0-4-4.9V5a1 1 0 0 0-2 0v1.1z"/>
            </svg>
            @if(count($notifications) > 0)
            <div class="badge">
                {{count($notifications)}}
            </div>
            @endif
        </div>

        @if($panelOpen)
            <div wire:poll.visible>
                <div class="text-white notifications-panel">
                    <div class="border-b border-80 ">
                        <div class="text-center px-6" id="notifications-panel-close" wire:click="togglePanel">&times;</div>
                    </div>
                    <div class="px-4 border-b border-80 overflow-y-scroll h-full">
                        @foreach($notifications as $notification)
                            <div class="notification table table-fixed w-full" style="cursor: pointer" wire:click="readNotification(`{{$notification->id}}`)">
                                    <span class="table-cell w-8 align-top py-4">
                                        @if($notification->data['type'] == 'success')
                                            <span>
                                            <svg aria-hidden="true" data-prefix="fas" data-icon="check-circle"
                                                 class="svg-inline--fa fa-check-circle fa-w-16" role="img"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 512 512"><path fill="#88bb71"
                                                                             d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>
                                            </span>
                                        @elseif($notification->data['type'] == 'info')
                                            <span>
                                                <svg aria-hidden="true" data-prefix="fas" data-icon="info-circle"
                                                     class="svg-inline--fa fa-info-circle fa-w-16" role="img"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 512 512"><path fill="#A3CCEF"
                                                                                 d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg>
                                              </span>
                                        @elseif($notification->data['type'] == 'warning')
                                            <span>
                                                <svg aria-hidden="true" data-prefix="fas"
                                                     data-icon="exclamation-triangle"
                                                     class="svg-inline--fa fa-exclamation-triangle fa-w-18" role="img"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 576 512"><path fill="#f4c739"
                                                                                 d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>
                                              </span>
                                        @elseif($notification->data['type'] == 'error')
                                            <span>
                                                <svg aria-hidden="true" data-prefix="fas" data-icon="exclamation-circle"
                                                     class="svg-inline--fa fa-exclamation-circle fa-w-16" role="img"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 512 512"><path fill="#c62828"
                                                                                 d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>
                                              </span>
                                        @endif
                                    </span>

                                <div class="table-cell w-full py-4 pl-4">
                                    <p>{{ $notification->data['title'] }}</p>
                                    <span class="text-sm text-70">{{ $notification->data['message'] }}</span>
                                    <p class="text-sm text-70">{{ \Carbon\Carbon::parse($notification->updated_at)->shortRelativeToNowDiffForHumans() }}</p>
                                </div>
                            </div>
                            <hr/>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
    .notification-button {
        color: white;
        display: inline-block; /* Inline elements with width and height. TL;DR they make the icon buttons stack from left-to-right instead of top-to-bottom */
        position: relative; /* All 'absolute'ly positioned elements are relative to this one */
    }

    .badge {
        background-color: #fa3e3e;
        border-radius: 2px;
        color: white;
        padding: 1px 3px;
        font-size: 10px;
        position: absolute;
        top: 0;
        right: 5px;
        border-width: 0;
        height: 12px;
    }

    .notifications-panel {
        z-index: 999;
        position: fixed !important;
        right: 0;
        top: 0;
        width: 340px;
        height: 100%;
        background-color: #536170;
        padding-bottom: 70px;
    }

    #notifications-panel-close {
        height: 60px;
        line-height: 60px;
        cursor: pointer;
    }

    #notifications-panel-close:hover {
        background-color: #252D37;
    }
</style>
