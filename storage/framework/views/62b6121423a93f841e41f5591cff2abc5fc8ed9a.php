<?php $__env->startSection('javascript'); ?>
  <script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="/js/jquery.poshytip.js"></script>
  <script type="text/javascript" src="/js/jquery.validate.js"></script>
  <script type="text/javascript" src="/js/noright.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    var isdemo = 0;
    if(isdemo==1)
    {
      //tb_show("系统提示","#TB_inline?width=400&height=120&inlineId=prohibit",false);
      parent.ymPrompt.alert({title:'申请提款',message:'试玩帐户不能进行“申请提款”操作！请您注册我们的正式帐号！'});
      $('#btnAtm').attr('value','试玩帐号不能提款操作');
      $('#btnAtm').attr('disabled','true');
      $('#money').attr('disabled','true');
      $('#bank').attr('disabled','true');
      $('#bankname').attr('disabled','true');
      $('#bankno').attr('disabled','true');
      $('#bankrealnam').attr('disabled','true');
      $('#atmpwd').attr('disabled','true');
    }
    
    $("#btnOK").click(function(){
      tb_remove();
    });
    
    $("#btnReg").click(function(){
      tb_remove();
      top.location.href='reg.php?utype=1';
    });
    $("#AtmForm").validate({
      rules: {
        money: {required:true, number:true, range:[1,13119.88]},
        bankname: {required: true},
        bankrealname: {required: true},
        bankno: {required:true, digits:true },
        atmpwd: {required:true, number:true,remote: "atm.php?type=check_atmpwd"}
      },
      messages: {
        money: {required: "请输入要提款的金额.", range: "提款金额必须在1-13119.88之间"},
        bankname: {required: "请输入帐户开户行信息."},
        bankrealname: {required: "请输入帐户名."},
        bankno: {required:"请输入银行帐号.",digits:"银行帐号必须是数字."},
        atmpwd: {required:"请输入提款密码.",number:"提款密码必须是数字.",remote: jQuery.format("[<b>提款密码</b>]:你输入的提款密码不正确.")}
      },
      //errorLabelContainer: $("#errorTo"),
      //wrapper: 'li',
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
  <link href="/css/tip-violet.css" rel="stylesheet" type="text/css" />
  <style>
    #TB_window {min-height:100px;}
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="col-sm-10">
      <div style="width:100%; height:288px; background-color:#FFFFFF; ">
          <div style="width:100%; height:31px;background-image:url(/images/rtoubu.png);" >  </div>
          <div style="width:100%;height:257px;background-image:url(/images/rzhongjian.png); padding:10px 0 0 0;" >
            <form id="AtmForm" method="post" action="w2atm.php?type=AddAtm">
              <table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0" style="color:#000000; border-color:#eeeeee; background-color:#FFFFFF; ">
                <tr  height="28">
                  <td align="right" >友情提醒：</td>
                  <td>可提款时间为:开盘日的 <font color=red> 中午11:40-12:40 下午15:00-16:30</font> 其他时间不受理敬请谅解！<br>
                  <font color=red>温馨提示：充值后没操作或有留仓的会员一律不能提款。</font></td>
                </tr>
                <tr height="28">
                  <td width="20%" align="right" >可提金额：</td>
                  <td> <span class="money">￥<?php echo e($moneywallet->after_amount); ?></span></td>
                </tr>
                <tr height="28">
                  <td align="right">提款金额：</td>
                  <td><input name="money" type="text" id="money" value="0" size="10"> 
                    &nbsp;<span class="gray">元(1~<?php echo e($moneywallet->after_amount); ?>之间)</span></td>
                </tr>
                <tr height="28">
                  <td align="right">收款银行：</td>
                  <td><select name="bank" size="1" id="bank">
                    <option value="工商银行" selected>工商银行</option>
                    <option value="建设银行">建设银行</option>
                    <option value="农业银行">农业银行</option>
                    <option value="招商银行">招商银行</option>
                    <option value="中国银行">中国银行</option>
                    <option value="浦东银行">浦东银行</option>
                    <option value="广发银行">广发银行</option>
                    <option value="交通银行">交通银行</option>
                    <option value="光大银行">光大银行</option>
                    <option value="北京银行">北京银行</option>
                    <option value="兴业银行">兴业银行</option>
                    <option value="民生银行">民生银行</option>
                    <option value="中信银行">中信银行</option>
                    <option value="邮政储蓄">邮政储蓄</option>
                  </select></td>
                </tr>
                <tr height="28">
                  <td align="right">开 户 行：</td>
                  <td><input name="bankname" type="text" id="bankname" size="30"> 
                    &nbsp;<span class="gray">请填写详细的开户信息XX银行XX分行XX支行</span></td>
                </tr>
                <tr height="28">
                  <td align="right">帐 户 名：</td>
                  <td><input name="bankrealname" type="text" id="bankrealname" size="30" value="张三" readonly> &nbsp;<span class="gray">不能修改(若想修改帐户名请联系管理员)</span></td>
                </tr>
                <tr height="28">
                  <td align="right">银行帐号：</td>
                  <td><input name="bankno" type="text" id="bankno" size="30"></td>
                </tr>
                <tr height="28">
                  <td align="right">提款密码：</td>
                  <td><input name="atmpwd" type="password" id="atmpwd" size="5" maxlength="4" style="width:50px"> </td>
                </tr>
                <tr height="28">
                  <td align="right">&nbsp;</td>
                  <td><input type="submit" name="Submit" id='btnAtm' value="确认提款" class="button3"></td>
                </tr>
              </table>
            </form>
          </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pc_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>