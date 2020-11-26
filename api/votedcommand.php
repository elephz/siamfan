<?php 
    $sqlvote = "SELECT 
                voted_id 
                FROM `tb_vote` 
                INNER join tb_user ON tb_user.User_id = tb_vote.voted_id 
                WHERE voter_id = '115' ";
?>