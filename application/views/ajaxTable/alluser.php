<?php
if( !empty($list) ){
?>
<table class="table data-table-large users-table">
    <tbody>
		<?php
			foreach ($list as $agent) {
				//Get online offline status
				$check_online_status = get_user_online_status( $agent->user_id );
				$online_offline_status = !empty( $check_online_status ) ? 
				'<i class="fa-solid fa-circle text-success fs-8"></i>' 
				: '<i class="fa-solid fa-circle text-danger fs-8"></i>';
				if($agent->user_type == 99){
					$agent_type = "Administrator";
				}elseif($agent->user_type == 98){
					$agent_type = get_manager_type( $agent->is_super_manager );
					
					/* if(   $agent->is_super_manager == 1 ){
						$agent_type = "Super Manager";
					}else if( $agent->is_super_manager == 2 ){
						$agent_type = "Leads Manager";
					}else{
						$agent_type = get_role_name($agent->user_type);
					} */
				}else{
					$agent_type = get_role_name($agent->user_type);
				}
				
		?>
        <tr>
            <td class="w-25">
                <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                    <div class="px-1 w-100 d-flex">
                        <div class="user_thumbnail">
                            <img src="./site/images/user_profile.jpg" alt="User Profile">
                        </div>
                        <p class="fs-7 mb-2 mt-0 ms-3">
                            <strong class="d-block mb-1">
                                <?= $agent->first_name . " " . $agent->last_name; ?> <?= $online_offline_status ?>
                            </strong>
                            <span class="fs-8 fw-500 text-secondary">Name</span>
                        </p>
                    </div>
                    <div class="bg-light p-1 w-100">
                        <span class="d-block fw-500 mb-1 fs-7 ms-1">
                            <?= $agent->mobile ?>
                        </span>
                        <span class="d-block fw-500 fs-7 ms-1">
                            <?= $agent->email ?>
                        </span>
                    </div>
                </div>
            </td>
            <td>
                <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                    <div class="w-100">
                        <div class="px-2">
                            <p class="fs-7 mb-2 mt-0 ">
                                <strong class="d-block mb-1"><?= $agent->user_name ?></strong>
                                <span class="fs-8 fw-500 text-secondary">User Name</span>
                            </p>
                        </div>
                    </div>
                    <div class="bg-light p-1 w-100">
                        <strong class="d-block fs-7 mb-1 text-dark"><?= $agent_type ?>m</strong>
                        <span class="fs-7 text-secondary">user role</span>
                    </div>
                </div>
            </td>
            <td>
                <div class="align-bottom align-content-between d-flex flex-wrap h-100 ">
                    <div class="px-2 mb-2">
                        <strong class="d-block fs-7 mb-1">
                            <?= date("d-F-Y h:i:s a", strtotime($agent->last_login)); ?>
                        </strong>
                        <span class="fs-8 fw-500 text-secondary"> Last Login </span>
                    </div>
                    <div class="bg-light p-1 w-100">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="fs-7 mb-1 mt-0 text-secondary ms-1">User Status </p>
                                <span class="badge bg-success ms-1"><strong><?= $agent->user_status ?></strong></span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="fs-7 mb-1 mt-0 text-secondary ms-1">Update User Status </p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="user1" checked>
                                    <label class="form-check-label mt-1" for="user1">
                                        Active/Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                        <li>
                            <a class="dropdown-item" href="<?= site_url("agents/view/$agent->user_id")?>"><i class="fa-solid fa-eye"></i> View</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?=site_url("agents/editagent/$agent->user_id")  ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
		<?php
			}
			?>
    </tbody>
</table>
<p><?php echo $links; ?></p>
<?php
}
?>