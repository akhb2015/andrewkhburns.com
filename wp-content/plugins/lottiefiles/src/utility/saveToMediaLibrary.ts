/**
 * Copyright 2022 Design Barn Inc.
 */

import { MediaItem, uploadMedia } from '@wordpress/media-utils';

interface IErrorProps {
  error: string;
}

interface IsaveToMediaLibrary {
  file?: File;
  onError?(error: IErrorProps): void;
  onFileSave(url: string): void;
  url?: string;
}

export const uploadToMediaLibrary = ({ file, onError, onFileSave }: IsaveToMediaLibrary): void => {
  uploadMedia({
    filesList: [file as File],
    onFileChange: ([fileObj]: MediaItem[]) => {
      if (fileObj && fileObj.id) {
        onFileSave(fileObj.url);
      }
    },
    onError: (error): void => {
      onError?.({ error: 'File upload error', ...error });
    },
    maxUploadFileSize: 500000,
  });
};

export const createJsonFile = (blobPart: Blob): File => {
  return new File([blobPart], `${Math.floor(Date.now() / 1000)}.json`, { type: 'application/json' });
};

export const saveToMediaLibrary = async ({ onError, onFileSave, url }: IsaveToMediaLibrary): Promise<void> => {
  try {
    const file: File = await fetch(url as string)
      .then(async (r: Response) => r.blob())
      .then((blobPart: Blob) => createJsonFile(blobPart));

    uploadToMediaLibrary({ file, onFileSave, onError });
  } catch (error) {
    onError?.({ error: 'Something went wrong!' });
  }
};
