<?php

namespace App\DTOs;

use Spatie\TypeScriptTransformer\Attributes\LiteralTypeScriptType;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class Icon
{
    private function __construct(
        #[LiteralTypeScriptType("'epapro'|'dx'|'glyphicon'")]
        public string $type,

        public string $icon
    ) {
    }

    /**
     * @param  'accountbox'|'add'|'addcolumnleft'|'addcolumnright'|'addrowabove'|'addrowbelow'|'addtable'|'airplane'|'aligncenter'|'alignjustify'|'alignleft'|'alignright'|'arrowback'|'arrowdown'|'arrowleft'|'arrowright'|'arrowup'|'background'|'bell'|'blockquote'|'bold'|'bookmark'|'box'|'bulletlist'|'car'|'card'|'cart'|'cellproperties'|'chart'|'chat'|'checklist'|'clear'|'clearcircle'|'clearformat'|'clock'|'close'|'codeblock'|'color'|'columnproperties'|'comment'|'dataarea'|'datapie'|'datatrending'|'datausage'|'decreaseindent'|'doc'|'download'|'edit'|'email'|'errorcircle'|'event'|'eventall'|'favorites'|'find'|'fixcolumn'|'fixcolumnleft'|'fixcolumnright'|'folder'|'fontsize'|'food'|'formula'|'gift'|'globe'|'group'|'growfont'|'handlehorizontal'|'handlevertical'|'header'|'help'|'home'|'image'|'increaseindent'|'indent'|'info'|'italic'|'key'|'like'|'link'|'map'|'mention'|'menu'|'mergecells'|'money'|'music'|'orderedlist'|'ordersbox'|'overflow'|'percent'|'photo'|'pinmap'|'plus'|'preferences'|'product'|'redo'|'refresh'|'remove'|'removecolumn'|'removerow'|'removetable'|'rowproperties'|'runner'|'save'|'search'|'sendfilled'|'shrinkfont'|'splitcells'|'stickcolumn'|'strike'|'subscript'|'superscript'|'tableproperties'|'tags'|'taskcomplete'|'taskhelpneeded'|'taskinprogress'|'taskrejected'|'taskstop'|'tel'|'tips'|'to'|'todo'|'toolbox'|'triangledown'|'triangleleft'|'triangleright'|'triangleup'|'underline'|'undo'|'unfixcolumn'|'user'|'variable'|'verticalalignbottom'|'verticalaligncenter'|'verticalaligntop'|'video'  $type
     */
    public static function dx(string $type): self
    {
        return new self('dx', $type);
    }

    /**
     * @param  'personnel_id'|'groups'|'special_func'|'reduce_voltage'|'smock'|'rfid'|'epapro'|'arrow_down'|'arrow_up'|'checkout'|'cross'|'handsfree'|'humidity'|'limit_high'|'limit_low'|'ok'|'shoe_left'|'shoe_right'|'shoes'|'temperature'|'voltage'|'wriststrap'|'wriststrap_hand'  $type
     */
    public static function epa(string $type): self
    {
        return new self('epapro', $type);
    }

    /**
     * @param  'asterisk'|'plus'|'euro'|'eur'|'minus'|'cloud'|'envelope'|'pencil'|'glass'|'music'|'search'|'heart'|'star'|'star-empty'|'user'|'film'|'th-large'|'th'|'th-list'|'ok'|'remove'|'zoom-in'|'zoom-out'|'off'|'signal'|'cog'|'trash'|'home'|'file'|'time'|'road'|'download-alt'|'download'|'upload'|'inbox'|'play-circle'|'repeat'|'refresh'|'list-alt'|'lock'|'flag'|'headphones'|'volume-off'|'volume-down'|'volume-up'|'qrcode'|'barcode'|'tag'|'tags'|'book'|'bookmark'|'print'|'camera'|'font'|'bold'|'italic'|'text-height'|'text-width'|'align-left'|'align-center'|'align-right'|'align-justify'|'list'|'indent-left'|'indent-right'|'facetime-video'|'picture'|'map-marker'|'adjust'|'tint'|'edit'|'share'|'check'|'move'|'step-backward'|'fast-backward'|'backward'|'play'|'pause'|'stop'|'forward'|'fast-forward'|'step-forward'|'eject'|'chevron-left'|'chevron-right'|'plus-sign'|'minus-sign'|'remove-sign'|'ok-sign'|'question-sign'|'info-sign'|'screenshot'|'remove-circle'|'ok-circle'|'ban-circle'|'arrow-left'|'arrow-right'|'arrow-up'|'arrow-down'|'share-alt'|'resize-full'|'resize-small'|'exclamation-sign'|'gift'|'leaf'|'fire'|'eye-open'|'eye-close'|'warning-sign'|'plane'|'calendar'|'random'|'comment'|'magnet'|'chevron-up'|'chevron-down'|'retweet'|'shopping-cart'|'folder-close'|'folder-open'|'resize-vertical'|'resize-horizontal'|'hdd'|'bullhorn'|'bell'|'certificate'|'thumbs-up'|'thumbs-down'|'hand-right'|'hand-left'|'hand-up'|'hand-down'|'circle-arrow-right'|'circle-arrow-left'|'circle-arrow-up'|'circle-arrow-down'|'globe'|'wrench'|'tasks'|'filter'|'briefcase'|'fullscreen'|'dashboard'|'paperclip'|'heart-empty'|'link'|'phone'|'pushpin'|'usd'|'gbp'|'sort'|'sort-by-alphabet'|'sort-by-alphabet-alt'|'sort-by-order'|'sort-by-order-alt'|'sort-by-attributes'|'sort-by-attributes-alt'|'unchecked'|'expand'|'collapse-down'|'collapse-up'|'log-in'|'flash'|'log-out'|'new-window'|'record'|'save'|'open'|'saved'|'import'|'export'|'send'|'floppy-disk'|'floppy-saved'|'floppy-remove'|'floppy-save'|'floppy-open'|'credit-card'|'transfer'|'cutlery'|'header'|'compressed'|'earphone'|'phone-alt'|'tower'|'stats'|'sd-video'|'hd-video'|'subtitles'|'sound-stereo'|'sound-dolby'|'sound-5-1'|'sound-6-1'|'sound-7-1'|'copyright-mark'|'registration-mark'|'cloud-download'|'cloud-upload'|'tree-conifer'|'tree-deciduous'|'cd'|'save-file'|'open-file'|'level-up'|'copy'|'paste'|'alert'|'equalizer'|'king'|'queen'|'pawn'|'bishop'|'knight'|'baby-formula'|'tent'|'blackboard'|'bed'|'apple'|'erase'|'hourglass'|'lamp'|'duplicate'|'piggy-bank'|'scissors'|'bitcoin'|'btc'|'xbt'|'yen'|'jpy'|'ruble'|'rub'|'scale'|'ice-lolly'|'ice-lolly-tasted'|'education'|'option-horizontal'|'option-vertical'|'menu-hamburger'|'modal-window'|'oil'|'grain'|'sunglasses'|'text-size'|'text-color'|'text-background'|'object-align-top'|'object-align-bottom'|'object-align-horizontal'|'object-align-left'|'object-align-vertical'|'object-align-right'|'triangle-right'|'triangle-left'|'triangle-bottom'|'triangle-top'|'console'|'superscript'|'subscript'|'menu-left'|'menu-right'|'menu-down'|'menu-up'  $type
     *
     * @deprecated DX- oder EPA-Icon verwenden
     */
    public static function glyph(string $type): self
    {
        return new self('glyphicon', $type);
    }
}
