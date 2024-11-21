const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload } = wp.blockEditor;
const { Button } = wp.components;

registerBlockType("custom/image-content", {
  title: "Image & Content",
  icon: "format-image",
  category: "custom-gutenberg-blocks",
  attributes: {
    imageUrl: { type: "string", default: "" },
    imageAlt: { type: "string", default: "" },
    title: { type: "string", default: "Your block title here..." },
    subtitle: { type: "string", default: "Your subtitle here..." },
    description: { type: "string", default: "Your description here..." },
  },

  // Editor render
  edit: ({ attributes, setAttributes }) => {
    const { imageUrl, imageAlt, title, subtitle, description } = attributes;

    return (
      <div
        className="custom-block"
        style={{
          display: "flex",
          alignItems: "center", // Untuk memastikan gambar dan teks sejajar di tengah
          gap: "20px", // Memberikan jarak antar gambar dan teks
          width: "1048.7px",
          height: "auto", // Ubah agar tinggi bisa fleksibel tergantung konten
          boxSizing: "border-box",
        }}
      >
        {/* Gambar */}
        <div className="block-image" style={{ flex: "1" }}>
          <MediaUpload
            onSelect={(media) =>
              setAttributes({ imageUrl: media.url, imageAlt: media.alt })
            }
            allowedTypes={["image"]}
            render={({ open }) => (
              <Button onClick={open} isPrimary>
                {imageUrl ? "Change Image" : "Select Image"}
              </Button>
            )}
          />
          {imageUrl && (
            <img
              src={imageUrl}
              alt={imageAlt}
              style={{
                width: "100%",
                height: "auto",
                border: "1px solid #ddd", // Masih mempertahankan border
              }}
            />
          )}
        </div>

        {/* Teks (Title, Subtitle, Description) */}
        <div
          className="block-content"
          style={{
            flex: "2", // Memberikan lebih banyak ruang pada konten teks
          }}
        >
          {/* Title */}
          <RichText
            tagName="h2"
            value={title}
            onChange={(value) => setAttributes({ title: value })}
            placeholder="Enter block title"
            style={{
              width: "100%",
              fontSize: "33px",
              fontWeight: "bold",
              color: "#F18825",
              marginBottom: "5px", // Space between title and subtitle
            }}
          />

          {/* Subtitle */}
          <RichText
            tagName="h4"
            value={subtitle}
            onChange={(value) => setAttributes({ subtitle: value })}
            placeholder="Enter subtitle"
            style={{
              width: "100%",
              fontSize: "23px",
              color: "#333",
              marginBottom: "8px", // Space between subtitle and description
            }}
          />

          {/* Description */}
          <RichText
            tagName="p"
            value={description}
            onChange={(value) => setAttributes({ description: value })}
            placeholder="Enter description"
            style={{
              width: "100%",
              fontSize: "16px",
              fontWeight: "normal",
              color: "#333",
            }}
          />
        </div>
      </div>
    );
  },

  // Frontend render
  save: ({ attributes }) => {
    const { imageUrl, imageAlt, title, subtitle, description } = attributes;

    return (
      <div
        className="custom-block"
        style={{
          display: "flex",
          alignItems: "center", // Untuk memastikan gambar dan teks sejajar di tengah
          gap: "20px", // Memberikan jarak antar gambar dan teks
          width: "1048.7px",
          height: "auto", // Ubah agar tinggi bisa fleksibel tergantung konten
          boxSizing: "border-box",
        }}
      >
        {/* Display Gambar */}
        <div className="block-image" style={{ flex: "1" }}>
          {imageUrl && (
            <img
              src={imageUrl}
              alt={imageAlt}
              style={{
                width: "100%",
                height: "auto",
                border: "1px solid #ddd", // Masih mempertahankan border
              }}
            />
          )}
        </div>

        {/* Display Teks */}
        <div
          className="block-content"
          style={{
            flex: "2", // Memberikan lebih banyak ruang pada konten teks
          }}
        >
          {/* Title */}
          {title && (
            <h2
              style={{
                fontSize: "33px",
                fontWeight: "bold",
                color: "#F18825",
                marginBottom: "5px", // Space between title and subtitle
              }}
            >
              {title}
            </h2>
          )}

          {/* Subtitle */}
          {subtitle && (
            <h4
              style={{
                fontSize: "23px",
                color: "#333",
                marginBottom: "8px", // Space between subtitle and description
              }}
            >
              {subtitle}
            </h4>
          )}

          {/* Description */}
          {description && (
            <p
              style={{
                fontSize: "16px",
                fontWeight: "normal",
                color: "#333",
              }}
            >
              {description}
            </p>
          )}
        </div>
      </div>
    );
  },
});
