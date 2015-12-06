{capture name='res'}{Func x=234 y=23.3}{/capture}
{assign var="res" value=$smarty.capture.res}
Function result: {if $res}{$res}{else}fu{/if}