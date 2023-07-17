CKEDITOR.ClassicEditor.create(document.getElementById("blog-content"), {
    toolbar: {
        items: [
            "undo",
            "redo",
            "|",
            "heading",
            "|",
            "bold",
            "italic",
            "underline",
            "|",
            "fontSize",
            "fontFamily",
            "fontColor",
            "|",
            "bulletedList",
            "numberedList",
            "|",
            "outdent",
            "indent",
            "|",
            "alignment",
            "|",
            "link",
            "insertImage",
            "blockQuote",
            "insertTable",
            "mediaEmbed",
            "|",
        ],
        shouldNotGroupWhenFull: true,
    },
    list: {
        properties: {
            styles: true,
            startIndex: true,
            reversed: true,
        },
    },
    heading: {
        options: [
            {
                model: "paragraph",
                title: "Paragraph",
                class: "ck-heading_paragraph",
            },
            {
                model: "heading1",
                view: "h1",
                title: "Heading 1",
                class: "ck-heading_heading1",
            },
            {
                model: "heading2",
                view: "h2",
                title: "Heading 2",
                class: "ck-heading_heading2",
            },
            {
                model: "heading3",
                view: "h3",
                title: "Heading 3",
                class: "ck-heading_heading3",
            },
        ],
    },
    fontFamily: {
        options: [
            "default",
            "Bebas Neue, sans-serif",
            "Arial, Helvetica, sans-serif",
            "Times New Roman, Times, serif",
        ],
        supportAllValues: true,
    },
    fontSize: {
        options: [10, 12, 13, 14, "default", 18, 20, 22],
        supportAllValues: true,
    },
    link: {
        decorators: {
            addTargetToExternalLinks: true,
            defaultProtocol: "https://",
            toggleDownloadable: {
                mode: "manual",
                label: "Downloadable",
                attributes: {
                    download: "file",
                },
            },
        },
    },
    // The "super-build" contains more premium features that require additional configuration, disable them below.
    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
    removePlugins: [
        // These two are commercial, but you can try them out without registering to a trial.
        // 'ExportPdf',
        // 'ExportWord',
        "CKBox",
        "CKFinder",
        "EasyImage",
        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
        // Storing images as Base64 is usually a very bad idea.
        // Replace it on production website with other solutions:
        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
        // 'Base64UploadAdapter',
        "RealTimeCollaborativeComments",
        "RealTimeCollaborativeTrackChanges",
        "RealTimeCollaborativeRevisionHistory",
        "PresenceList",
        "Comments",
        "TrackChanges",
        "TrackChangesData",
        "RevisionHistory",
        "Pagination",
        "WProofreader",
        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
        // from a local file system (file://) - load this site via HTTP server if you enable MathType.
        "MathType",
        // The following features are part of the Productivity Pack and require additional license.
        "SlashCommand",
        "Template",
        "DocumentOutline",
        "FormatPainter",
        "TableOfContents",
    ],
});
