<?php
/**
 *File name : file_manager.php  / Date: 6/20/2019 - 3:48 PM
 *Code Owner: Tke
 */

define('CONTENT_TYPE_PHOTOS', 1);
define('CONTENT_TYPE_VIDEO', 2);
define('CONTENT_TYPE_FILES', 3);


return [


    'folder'       => [
        'main'       => 'KO_file_manager',
        'photos'     => 'KO_photos',
        'files'      => 'KO_files',
        'thumbnails' => 'KO_thumbnails'
    ],


    // fixed
    'folder_types' => [
        1 => 'photos',
        2 => 'files',
        3 => 'thumbnails'
    ],

    'valid_mime_types' => [

        'photos' => [
            'gif',
            'jpg',
            'jpeg',
            'png',
        ],

        'files'  => [
            'pdf',
            'doc',
            'docx',
            'xls',
            'xlsx',
            'ppt',
            'pptx',
            'mp3',
        ],
        'videos' => [
            'mp3',
            'video',
            'mp4',
        ]

    ],

    'cache_keys' => [
        'files'   => 'file_manager_files',
        'folders' => 'file_manager_folders',
    ],

    'mime_types' => [
        'pdf' => 'application/pdf',

        'word' => 'application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.wordprocessingml.template, application/vnd.ms-word.document.macroEnabled.12, application/vnd.ms-word.template.macroEnabled.12',

        'excel' => 'application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.openxmlformats-officedocument.spreadsheetml.template, application/vnd.ms-excel.sheet.macroEnabled.12, application/vnd.ms-excel.template.macroEnabled.12, application/vnd.ms-excel.addin.macroEnabled.12, application/vnd.ms-excel.sheet.binary.macroEnabled.12',

        'powerpoint' => 'application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.presentation, application/vnd.openxmlformats-officedocument.presentationml.template, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.ms-powerpoint.addin.macroEnabled.12, application/vnd.ms-powerpoint.presentation.macroEnabled.12, application/vnd.ms-powerpoint.template.macroEnabled.12, application/vnd.ms-powerpoint.slideshow.macroEnabled.12',

        'access' => 'application/vnd.ms-access',

        'image' => 'image/aces, image/avci, image/avcs, image/avif, image/bmp, image/cgm, image/dicom-rle, image/emf, image/example, image/fits, image/g3fax, image/gif, image/heic, image/heic-sequence, image/heif, image/heif-sequence, image/hej2k, image/hsj2, image/ief, image/jls, image/jp2, image/jpeg, image/jph, image/jphc, image/jpm, image/jpx, image/jxr, image/jxrA, image/jxrS, image/jxs, image/jxsc, image/jxsi, image/jxss, image/ktx, image/ktx2, image/naplps, image/png, image/prs.btif, image/prs.pti, image/pwg-raster, image/svg+xml, image/t38, image/tiff, image/tiff-fx, image/vnd.adobe.photoshop, image/vnd.airzip.accelerator.azv, image/vnd.cns.inf2, image/vnd.dece.graphic, image/vnd.djvu, image/vnd.dwg, image/vnd.dxf, image/vnd.dvb.subtitle, image/vnd.fastbidsheet, image/vnd.fpx, image/vnd.fst, image/vnd.fujixerox.edmics-mmr, image/vnd.fujixerox.edmics-rlc, image/vnd.globalgraphics.pgb, image/vnd.microsoft.icon, image/vnd.mix, image/vnd.ms-modi, image/vnd.mozilla.apng, image/vnd.net-fpx, image/vnd.pco.b16, image/vnd.radiance, image/vnd.sealed.png, image/vnd.sealedmedia.softseal.gif, image/vnd.sealedmedia.softseal.jpg, image/vnd.svf, image/vnd.tencent.tap, image/vnd.valve.source.texture, image/vnd.wap.wbmp, image/vnd.xiff, image/vnd.zbrush.pcx, image/wmf, image/emf, image/wmf',

        'audio' => 'audio/1d-interleaved-parityfec, audio/32kadpcm, audio/3gpp, audio/3gpp2, audio/aac, audio/ac3, audio/AMR, audio/AMR-WB, audio/amr-wb+, audio/aptx, audio/asc, audio/ATRAC-ADVANCED-LOSSLESS, audio/ATRAC-X, audio/ATRAC3, audio/basic, audio/BV16, audio/BV32, audio/clearmode, audio/CN, audio/DAT12, audio/dls, audio/dsr-es201108, audio/dsr-es202050, audio/dsr-es202211, audio/dsr-es202212, audio/DV, audio/DVI4, audio/eac3, audio/encaprtp, audio/EVRC, audio/EVRC-QCP, audio/EVRC0, audio/EVRC1, audio/EVRCB, audio/EVRCB0, audio/EVRCB1, audio/EVRCNW, audio/EVRCNW0, audio/EVRCNW1, audio/EVRCWB, audio/EVRCWB0, audio/EVRCWB1, audio/EVS, audio/example, audio/flexfec, audio/fwdred, audio/G711-0, audio/G719, audio/G7221, audio/G722, audio/G723, audio/G726-16, audio/G726-24, audio/G726-32, audio/G726-40, audio/G728, audio/G729, audio/G7291, audio/G729D, audio/G729E, audio/GSM, audio/GSM-EFR, audio/GSM-HR-08, audio/iLBC, audio/ip-mr_v2.5, audio/L8, audio/L16, audio/L20, audio/L24, audio/LPC, audio/MELP, audio/MELP600, audio/MELP1200, audio/MELP2400, audio/mhas, audio/mobile-xmf, audio/MPA, audio/mp4, audio/MP4A-LATM, audio/mpa-robust, audio/mpeg, audio/mpeg4-generic, audio/ogg, audio/opus, audio/parityfec, audio/PCMA, audio/PCMA-WB, audio/PCMU, audio/PCMU-WB, audio/prs.sid, audio/raptorfec, audio/RED, audio/rtp-enc-aescm128, audio/rtploopback, audio/rtp-midi, audio/rtx, audio/scip, audio/SMV, audio/SMV0, audio/SMV-QCP, audio/sofa, audio/sp-midi, audio/speex, audio/t140c, audio/t38, audio/telephone-event, audio/TETRA_ACELP, audio/TETRA_ACELP_BB, audio/tone, audio/TSVCIS, audio/UEMCLIP, audio/ulpfec, audio/usac, audio/VDVI, audio/VMR-WB, audio/vnd.3gpp.iufp, audio/vnd.4SB, audio/vnd.audiokoz, audio/vnd.CELP, audio/vnd.cisco.nse, audio/vnd.cmles.radio-events, audio/vnd.cns.anp1, audio/vnd.cns.inf1, audio/vnd.dece.audio, audio/vnd.digital-winds, audio/vnd.dlna.adts, audio/vnd.dolby.heaac.1, audio/vnd.dolby.heaac.2, audio/vnd.dolby.mlp, audio/vnd.dolby.mps, audio/vnd.dolby.pl2, audio/vnd.dolby.pl2x, audio/vnd.dolby.pl2z, audio/vnd.dolby.pulse.1, audio/vnd.dra, audio/vnd.dts, audio/vnd.dts.hd, audio/vnd.dts.uhd, audio/vnd.dvb.file, audio/vnd.everad.plj, audio/vnd.hns.audio, audio/vnd.lucent.voice, audio/vnd.ms-playready.media.pya, audio/vnd.nokia.mobile-xmf, audio/vnd.nortel.vbk, audio/vnd.nuera.ecelp4800, audio/vnd.nuera.ecelp7470, audio/vnd.nuera.ecelp9600, audio/vnd.octel.sbc, audio/vnd.presonus.multitrack, audio/vnd.qcelp, audio/vnd.rhetorex.32kadpcm, audio/vnd.rip, audio/vnd.sealedmedia.softseal.mpeg, audio/vnd.vmx.cvsd, audio/vorbis, audio/vorbis-config',

        'video' => 'video/1d-interleaved-parityfec, video/3gpp, video/3gpp2, video/3gpp-tt, video/AV1, video/BMPEG, video/BT656, video/CelB, video/DV, video/encaprtp, video/example, video/FFV1, video/flexfec, video/H261, video/H263, video/H263-1998, video/H263-2000, video/H264, video/H264-RCDO, video/H264-SVC, video/H265, video/iso.segment, video/JPEG, video/jpeg2000, video/mj2, video/MP1S, video/MP2P, video/MP2T, video/mp4, video/MP4V-ES, video/MPV, video/mpeg, video/mpeg4-generic, video/nv, video/ogg, video/parityfec, video/pointer, video/quicktime, video/raptorfec, video/raw, video/rtp-enc-aescm128, video/rtploopback, video/rtx, video/scip, video/smpte291, video/SMPTE292M, video/ulpfec, video/vc1, video/vc2, video/vnd.CCTV, video/vnd.dece.hd, video/vnd.dece.mobile, video/vnd.dece.mp4, video/vnd.dece.pd, video/vnd.dece.sd, video/vnd.dece.video, video/vnd.directv.mpeg, video/vnd.directv.mpeg-tts, video/vnd.dlna.mpeg-tts, video/vnd.dvb.file, video/vnd.fvt, video/vnd.hns.video, video/vnd.iptvforum.1dparityfec-1010, video/vnd.iptvforum.1dparityfec-2005, video/vnd.iptvforum.2dparityfec-1010, video/vnd.iptvforum.2dparityfec-2005, video/vnd.iptvforum.ttsavc, video/vnd.iptvforum.ttsmpeg2, video/vnd.motorola.video, video/vnd.motorola.videop, video/vnd.mpegurl, video/vnd.ms-playready.media.pyv, video/vnd.nokia.interleaved-multimedia, video/vnd.nokia.mp4vr, video/vnd.nokia.videovoip, video/vnd.objectvideo, video/vnd.radgamettools.bink, video/vnd.radgamettools.smacker, video/vnd.sealed.mpeg1, video/vnd.sealed.mpeg4, video/vnd.sealed.swf, video/vnd.sealedmedia.softseal.mov, video/vnd.uvvu.mp4, video/vnd.youtube.yt, video/vnd.vivo, video/VP8',

        'archives' => 'application/zip, application/x-zoo, application/x-xar, application/x-stuffitx, application/x-stuffit, application/x-rar-compressed, application/x-ms-wim, application/x-lzx, application/x-lzh, application/x-gtar, application/x-gca-compressed, application/x-freearc, application/x-dgc-compressed, application/x-dar, application/x-cfs-compressed, application/x-b1, application/x-astrotite-afa, application/x-arj, application/x-apple-diskimage, 	application/x-alz-compressed, application/x-ace-compressed, application/x-7z-compressed, application/x-7z-compressed, application/vnd.ms-cab-compressed, application/vnd.android.package-archive, application/octet-stream, application/java-archive'
    ]

];

