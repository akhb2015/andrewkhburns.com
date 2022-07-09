/**
 * Copyright 2022 Design Barn Inc.
 */

export const mutation = {
  createHitCountEvent: `
    mutation createHitCountEvent(
      $source: Float
      $userId: Float
      $visitorId: Float
      $resourceId: Float!
      $method: Float!
    ) {
      createHitCountEvent(
        source: $source
        userId: $userId
        visitorId: $visitorId
        resourceId: $resourceId
        method: $method
      ) {
        status
        message
      }
    }
  `,
};
