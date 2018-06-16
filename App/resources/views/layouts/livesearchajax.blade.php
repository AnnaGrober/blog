<?php
if(!empty($posts))
{
    $count = 1;
    $outputhead = '';
    $outputbody = '';
    $outputtail ='';

    $outputhead .= '<div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                ';
    foreach ($posts as $post)
    {
        $outputbody .=  '
                            <tr>
                               <td><a href="http://portal/category/'.$post->id.'">
		                        '.$post->ad.'</a></td>
                            </tr>
                    ';
    }
    $outputtail .= '
                        </tbody>
                    </table>
                </div>';

    echo $outputhead;
    echo $outputbody;
    echo $outputtail;
}

else
{
    echo 'Data Not Found';
}
?>