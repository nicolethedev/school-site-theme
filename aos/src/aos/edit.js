/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {
	useBlockProps,
	InspectorControls,
	InnerBlocks,
} from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";
const AOS_OPTIONS = [
	{ label: __("Fade Up", "fwd-blocks"), value: "fade-up" },
	{ label: __("Fade Down", "fwd-blocks"), value: "fade-down" },
	{ label: __("Fade Left", "fwd-blocks"), value: "fade-left" },
	{ label: __("Fade Right", "fwd-blocks"), value: "fade-right" },
	{ label: __("Zoom In", "fwd-blocks"), value: "zoom-in" },
	{ label: __("Zoom Out", "fwd-blocks"), value: "zoom-out" },
];

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Animation Settings", "fwd-blocks")}>
					<SelectControl
						label={__("Animation", "fwd-blocks")}
						value={attributes.aosAnimation}
						options={AOS_OPTIONS}
						onChange={(value) => setAttributes({ aosAnimation: value })}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()} data-aos={attributes.aosAnimation}>
				<InnerBlocks />
			</div>
		</>
	);
}
